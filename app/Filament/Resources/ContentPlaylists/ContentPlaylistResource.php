<?php

namespace App\Filament\Resources\ContentPlaylists;

use App\Filament\Resources\ContentPlaylists\Pages;
use App\Models\ContentPlaylist;
use App\Services\AdminTranslateService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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

class ContentPlaylistResource extends Resource
{
    protected static ?string $model = ContentPlaylist::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Konten Website';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-play-circle';

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationLabel = 'Playlist Konten';

    protected static ?string $modelLabel = 'Playlist Konten';

    protected static ?string $pluralModelLabel = 'Playlist Konten';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Actions::make([
                    Action::make('translatePlaylistToChinese')
                        ->label('Terjemahkan ke Mandarin')
                        ->icon('heroicon-o-language')
                        ->color('info')
                        ->action(function (Get $schemaGet, Set $schemaSet): void {
                            $service = app(AdminTranslateService::class);

                            $pairs = [
                                'title' => 'title_zh',
                                'description' => 'description_zh',
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
                                    ->body('Isi Judul Konten atau Deskripsi terlebih dahulu.')
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
                    ->label('Judul Konten')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_zh')
                    ->label('Judul China')
                    ->helperText('Klik tombol Terjemahkan ke Mandarin di atas untuk mengisi otomatis. Tetap bisa diedit manual.')
                    ->maxLength(255),

                TextInput::make('platform')
                    ->label('Platform')
                    ->placeholder('YouTube / TikTok / Instagram')
                    ->maxLength(100),

                TextInput::make('url')
                    ->label('URL Konten')
                    ->url()
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('playlists')
                    ->visibility('public')
                    ->imageEditor()
                    ->helperText('Jika thumbnail tidak diisi, sistem otomatis mengambil thumbnail dari konten YouTube berdasarkan URL konten.')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('description_zh')
                    ->label('Deskripsi China')
                    ->helperText('Bisa diedit manual setelah diterjemahkan.')
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title_zh')
                    ->label('Judul China')
                    ->placeholder('-')
                    ->searchable(),

                TextColumn::make('platform')
                    ->label('Platform')
                    ->badge()
                    ->placeholder('-'),

                TextColumn::make('url')
                    ->label('URL')
                    ->limit(35)
                    ->copyable()
                    ->placeholder('-'),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListContentPlaylists::route('/'),
            'create' => Pages\CreateContentPlaylist::route('/create'),
            'edit' => Pages\EditContentPlaylist::route('/{record}/edit'),
        ];
    }
}
