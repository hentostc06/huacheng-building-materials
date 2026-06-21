<?php

namespace App\Filament\Resources\ProductCategories;

use App\Models\ProductCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Services\AdminTranslateService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Katalog Produk';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationLabel = 'Kategori Produk';

    protected static ?string $modelLabel = 'Kategori Produk';

    protected static ?string $pluralModelLabel = 'Kategori Produk';




    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                Actions::make([
                    Action::make('translateProductCategoryToChinese')
                        ->label('Terjemahkan ke Mandarin')
                        ->icon('heroicon-o-language')
                        ->color('info')
                        ->action(function (Get $schemaGet, Set $schemaSet): void {
                            $sourceText = trim((string) $schemaGet('name'));

                            if ($sourceText === '') {
                                Notification::make()
                                    ->title('Belum ada nama kategori')
                                    ->body('Isi Nama Kategori terlebih dahulu.')
                                    ->warning()
                                    ->send();

                                return;
                            }

                            $result = app(AdminTranslateService::class)->translate($sourceText);

                            if (! $result) {
                                Notification::make()
                                    ->title('Translate gagal')
                                    ->body('Isi Nama China secara manual dulu.')
                                    ->danger()
                                    ->send();

                                return;
                            }

                            $schemaSet('name_zh', $result);

                            Notification::make()
                                ->title('Translate berhasil')
                                ->body('Nama China berhasil diisi. Silakan cek dan koreksi sebelum Save.')
                                ->success()
                                ->send();
                        }),
                ])->columnSpanFull(),

                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->placeholder('contoh: Dinding')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, callable $set): void {
                        $set('slug', $state ? Str::slug($state) : null);
                        $set('name_zh', ProductCategory::translateNameToChinese($state));
                    }),

                TextInput::make('name_zh')
                    ->label('Nama China')
                    ->placeholder('isi otomatis setelah klik tombol translate')
                    ->helperText('Bisa diedit manual. Kosongkan field ini lalu blur Nama Kategori untuk translate ulang.')
                    ->dehydrated(true),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->placeholder('contoh: dinding')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name_zh')
                    ->label('Nama China')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('name')
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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
