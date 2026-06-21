<?php

namespace App\Filament\Resources\ContentPlaylists;

use App\Filament\Resources\ContentPlaylists\Pages;
use App\Models\ContentPlaylist;
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

class ContentPlaylistResource extends Resource
{
    protected static ?string $model = ContentPlaylist::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Konten Website';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-play-circle';

    protected static ?int $navigationSort = 30;

    protected static ?string $navigationLabel = 'Playlist Konten';

    protected static ?string $modelLabel = 'Playlist Konten';

    protected static ?string $pluralModelLabel = 'Playlist Konten';




    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('Judul Konten')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('title_zh', app(\App\Services\GoogleTranslateService::class)->translate($state))),

                TextInput::make('title_zh')
                    ->label('Judul China')
                    ->maxLength(255),

                TextInput::make('platform')
                    ->label('Platform')
                    ->placeholder('YouTube / TikTok / Instagram')
                    ->maxLength(255),

                TextInput::make('url')
                    ->label('URL Konten')
                    ->url()
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->helperText('Jika thumbnail tidak diisi, sistem otomatis mengambil thumbnail dari konten YouTube berdasarkan URL konten.')
                    ->image()
                    ->disk('public')
                    ->directory('content-playlists')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('description_zh', app(\App\Services\GoogleTranslateService::class)->translate($state)))
                    ->columnSpanFull(),

                Textarea::make('description_zh')
                    ->label('Deskripsi China')
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

                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('title_zh')->label('Judul China')->placeholder('-'),
                TextColumn::make('platform')->label('Platform')->placeholder('-'),
                TextColumn::make('url')->label('URL')->limit(40)->copyable(),
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
            'index' => Pages\ListContentPlaylists::route('/'),
            'create' => Pages\CreateContentPlaylist::route('/create'),
            'edit' => Pages\EditContentPlaylist::route('/{record}/edit'),
        ];
    }
}
