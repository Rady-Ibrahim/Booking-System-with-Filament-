<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form ->
        schema([
            Group::make()
            ->schema([
            Forms\Components\Select::make('booking_id')
                ->label('Booking')
                ->relationship('Booking', 'id') // عرض ID الحجز
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name . ' - ' . $record->service->name)

                ->searchable()
                ->required(),

                TextInput::make('amount')
                ->numeric()
                ->prefix('$')
                ->required(),

            ]),
            Forms\Components\Select::make('method')
                ->options([
                    'cash' => 'Cash',
                    'card' => 'Card',
                    'online' => 'Online',
                ])
                ->default('cash')
                ->required(),

            Forms\Components\Select::make('status')
                ->options([
                    'paid' => 'Paid',
                    'unpaid' => 'Unpaid',
                    'refunded' => 'Refunded',
                ])
                ->default('unpaid')
                ->required(),

                Section::make('Attachments')
                ->schema([
                    RichEditor::make('notes')
                    ->label('Notes')
                    ->required(),
                


                FileUpload::make('attachments')
                ->label('Attachments')
                ->multiple()
                ->image()
                ->disk('public')
                ->required(),
                ])
        ]);
    
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')
                ->sortable(),
    
            Tables\Columns\TextColumn::make('booking.user.name')
                ->label('Customer')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('booking.service.name')
                ->label('Service')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('amount')
                ->money('usd')
                ->sortable(),
    
            Tables\Columns\BadgeColumn::make('method')
                ->colors([
                    'success' => 'cash',
                    'warning' => 'card',
                    'info' => 'online',
                ]),
    
            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'success' => 'paid',
                    'danger' => 'unpaid',
                    'warning' => 'refunded',
                ]),
    
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Created'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
