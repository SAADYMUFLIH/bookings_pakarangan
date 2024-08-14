<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HousekeepingTask;
use Filament\Resources\Resource;
use App\Models\HousekeepingEmployee;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HousekeepingTaskResource\Pages;
use App\Filament\Resources\HousekeepingTaskResource\RelationManagers;
use Filament\Forms\Components\Tabs\Tab;

class HousekeepingTaskResource extends Resource
{
    protected static ?string $model = HousekeepingTask::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Housekeeping';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('room_id')
                ->relationship('room', 'number')
                ->required()
                ->label('Room Number')
                ->disabled(),
                Forms\Components\Select::make('housekeeping_employee_id')
                ->relationship('employee', 'name')
                ->nullable()
                ->label('Housekeeping Member'),
                Forms\Components\Select::make('status')
                ->options([
                    'dirty' => 'Dirty',
                    'completed' => 'Completed',
                ])
                ->default('dirty') // Set default status
                ->required()
                ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.number')
                ->label('Room Number')
                ->searchable(),
                Tables\Columns\TextColumn::make('employee.name')
                ->label('Housekeeping Members')
                ->default('Name not assigned')
                ->formatStateUsing(fn ($state) => $state ?: 'Name not assigned'),
                Tables\Columns\TextColumn::make('status')
                ->searchable()
                ->label('Status'),
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
            'index' => Pages\ListHousekeepingTasks::route('/'),
            'create' => Pages\CreateHousekeepingTask::route('/create'),
            'edit' => Pages\EditHousekeepingTask::route('/{record}/edit'),
        ];
    }
}
