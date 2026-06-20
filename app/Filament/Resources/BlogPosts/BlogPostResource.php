<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages;
use App\Models\BlogPost;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
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

                TextInput::make('title')
                    ->label('Judul Blog')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('slug', $state ? Str::slug($state) : null)),

                TextInput::make('title_zh')
                    ->label('Judul China')
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
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('content')
                    ->label('Isi Blog')
                    ->rows(8)
                    ->columnSpanFull(),

                Textarea::make('content_zh')
                    ->label('Isi Blog China')
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
