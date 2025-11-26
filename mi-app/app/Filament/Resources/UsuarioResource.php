<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuarioResource\Pages;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('apellido')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('contrasena')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_nacimiento'),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->maxLength(20),
                Forms\Components\TextInput::make('direccion')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ciudad')
                    ->maxLength(100),
                Forms\Components\TextInput::make('pais')
                    ->maxLength(100),
                Forms\Components\TextInput::make('codigo_postal')
                    ->maxLength(10),
                Forms\Components\Select::make('estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                        'suspendido' => 'Suspendido',
                    ])
                    ->required(),
                Forms\Components\Select::make('rol')
                    ->options([
                        'usuario' => 'Usuario',
                        'administrador' => 'Administrador',
                        'moderador' => 'Moderador',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('avatar')
                    ->maxLength(255),
                Forms\Components\Toggle::make('verificado')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('apellido')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rol'),
                Tables\Columns\TextColumn::make('estado'),
                Tables\Columns\IconColumn::make('verificado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_registro')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuario::route('/create'),
            'edit' => Pages\EditUsuario::route('/{record}/edit'),
        ];
    }
}
