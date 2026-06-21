<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages;
use App\Models\BlogPost;
use App\Services\AdminTranslateService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Konten Website';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationLabel = 'Blog Perusahaan';

    protected static ?string $modelLabel = 'Blog Perusahaan';

    protected static ?string $pluralModelLabel = 'Blog Perusahaan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Actions::make([
                    Action::make('translateBlogToChinese')
                        ->label('Terjemahkan ke Mandarin')
                        ->icon('heroicon-o-language')
                        ->color('info')
                        ->action(function (Get $schemaGet, Set $schemaSet): void {
                            $service = app(AdminTranslateService::class);

                            $pairs = [
                                'title' => 'title_zh',
                                'excerpt' => 'excerpt_zh',
                                'content' => 'content_zh',
                            ];

                            $filled = 0;
                            $translated = 0;

                            foreach ($pairs as $sourceField => $targetField) {
                                $sourceText = trim((string) $schemaGet($sourceField));

                                if ($sourceText === '') {
                                    continue;
                                }

                                $filled++;

                                $result = $service->translate($sourceText);

                                if ($result) {
                                    $schemaSet($targetField, $result);
                                    $translated++;
                                }
                            }

                            if ($filled === 0) {
                                Notification::make()
                                    ->title('Belum ada teks Indonesia')
                                    ->body('Isi Judul Blog, Ringkasan, atau Isi Blog terlebih dahulu.')
                                    ->warning()
                                    ->send();

                                return;
                            }

                            if ($translated === 0) {
                                Notification::make()
                                    ->title('Translate gagal')
                                    ->body('Isi field China secara manual dulu.')
                                    ->danger()
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->title('Translate berhasil')
                                ->body('Field China berhasil diisi. Silakan cek dan koreksi sebelum Save.')
                                ->success()
                                ->send();
                        }),
                ])->columnSpanFull(),

                TextInput::make('title')
                    ->label('Judul Blog')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('slug', $state ? Str::slug($state) : null)),

                TextInput::make('title_zh')
                    ->label('Judul China')
                    ->helperText('Klik tombol Terjemahkan ke Mandarin di atas untuk mengisi otomatis. Tetap bisa diedit manual.')
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('excerpt_zh')
                    ->label('Ringkasan China')
                    ->helperText('Bisa diedit manual setelah diterjemahkan.')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('content')
                    ->label('Isi Blog')
                    ->rows(8)
                    ->columnSpanFull(),

                Textarea::make('content_zh')
                    ->label('Isi Blog China')
                    ->helperText('Bisa diedit manual setelah diterjemahkan.')
                    ->rows(8)
                    ->columnSpanFull(),

                FileUpload::make('cover_image')
                    ->label('Cover Blog')
                    ->image()
                    ->disk('public')
                    ->directory('blog')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->seconds(false),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->label('Cover')->disk('public')->square(),
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('title_zh')->label('Judul China')->placeholder('-'),
                TextColumn::make('published_at')->label('Publish')->dateTime('d M Y H:i')->sortable()->placeholder('-'),
                IconColumn::make('is_active')->label('Aktif')->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
