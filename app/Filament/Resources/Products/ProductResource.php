<?php

namespace App\Filament\Resources\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Katalog Produk';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cube';

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';




    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_category_id')
                    ->label('Kategori Produk')
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn (ProductCategory $record): string => $record->display_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->label('Nama Produk')
                    ->placeholder('contoh: Panel Dinding Berinsulasi Rockwool')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, callable $set, callable $get): void {
                        $set('slug', $state ? Str::slug($state) : null);
                        $set('name_zh', Product::translateNameToChinese($state));
                        $set('short_description_zh', Product::translateShortDescriptionInputToChinese($state, $get('short_description')));
                        $set('description_zh', Product::translateDescriptionInputToChinese($state, $get('description')));
                        $set('specification_zh', Product::translateSpecificationInputToChinese($state, $get('specification')));
                    }),

                TextInput::make('name_zh')
                    ->label('Nama China')
                    ->placeholder('otomatis')
                    ->readOnly()
                    ->dehydrated(true),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set, callable $get) => $set('short_description_zh', Product::translateShortDescriptionInputToChinese($get('name'), $state)))
                    ->columnSpanFull(),

                Textarea::make('short_description_zh')
                    ->label('Deskripsi Singkat China')
                    ->readOnly()
                    ->dehydrated(true)
                    ->rows(2)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi Produk')
                    ->rows(5)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set, callable $get) => $set('description_zh', Product::translateDescriptionInputToChinese($get('name'), $state)))
                    ->columnSpanFull(),

                Textarea::make('description_zh')
                    ->label('Deskripsi Produk China')
                    ->readOnly()
                    ->dehydrated(true)
                    ->rows(5)
                    ->columnSpanFull(),

                Textarea::make('specification')
                    ->label('Spesifikasi')
                    ->rows(5)
                    ->placeholder("Ukuran:\nMaterial:\nWarna:\nKeterangan:")
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (?string $state, callable $set, callable $get) => $set('specification_zh', Product::translateSpecificationInputToChinese($get('name'), $state)))
                    ->columnSpanFull(),

                Textarea::make('specification_zh')
                    ->label('Spesifikasi China')
                    ->readOnly()
                    ->dehydrated(true)
                    ->rows(5)
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->visibility('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                Toggle::make('is_featured')
                    ->label('Produk Unggulan')
                    ->default(false),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name_zh')
                    ->label('Nama China')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('category.display_name')
                    ->label('Kategori')
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR')
                    ->placeholder('-')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
