<?php

namespace App\Filament\Resources\CompanyProjects;

use App\Filament\Resources\CompanyProjects\Pages;
use App\Models\CompanyProject;
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

class CompanyProjectResource extends Resource
{
    protected static ?string $model = CompanyProject::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Konten Website';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationLabel = 'Proyek Dikerjakan';

    protected static ?string $modelLabel = 'Proyek Dikerjakan';

    protected static ?string $pluralModelLabel = 'Proyek Dikerjakan';




    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('Judul Proyek')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set) => $set('title_zh', app(\App\Services\GoogleTranslateService::class)->translate($state))),

                TextInput::make('title_zh')
                    ->label('Judul China')
                    ->maxLength(255),

                TextInput::make('location')
                    ->label('Lokasi')
                    ->maxLength(255),

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

                FileUpload::make('image')
                    ->label('Gambar Proyek')
                    ->image()
                    ->disk('public')
                    ->directory('projects')
                    ->visibility('public')
                    ->imageEditor()
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

                ImageColumn::make('image')->label('Gambar')->disk('public')->square(),
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('title_zh')->label('Judul China')->placeholder('-'),
                TextColumn::make('location')->label('Lokasi')->placeholder('-'),
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
            'index' => Pages\ListCompanyProjects::route('/'),
            'create' => Pages\CreateCompanyProject::route('/create'),
            'edit' => Pages\EditCompanyProject::route('/{record}/edit'),
        ];
    }
}
