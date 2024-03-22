<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsightResource\Pages;
use App\Models\MedicationProtocolStage;
use App\Models\MedicationUseType;
use App\Models\ResourceCategory;
use App\Models\ResourceData;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InsightResource extends Resource
{
    protected static ?string $model = ResourceData::class;
    protected static ?string $navigationGroup = 'Resource';
    protected static ?string $navigationLabel = 'Resource data';
    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    // private static function getAgeArray(): array
    // {
    //     for ($j = 18; $j <= 70; $j++) {
    //         $options[$j] = $j . " Year";
    //     }
    //     return $options ?? [];
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('topic_name')
                            ->placeholder('Header')
                            ->label('Header')
                            ->required(),
                        Select::make('resource_category')
                            ->label('Category')
                            ->options(
                                ResourceCategory::where("is_delete", "=", "0")
                                    ->where("main_cat_id", "=", "0")
                                    ->get()
                                    ->pluck('name', 'resource_cat_id')
                                // self::getCategories()
                            )->native(false),
                        RichEditor::make('description')
                            ->label('Description'),
                        Radio::make('resource_file_type')
                            ->label('Select Image or Video for Header')
                            ->live()
                            ->options([
                                'video' => 'Video',
                                'image' => 'Image',
                            ])
                            ->default('video')
                            ->inline(),
                        TextInput::make('background_video')
                            ->placeholder('Enter Wistia Video Id')
                            ->label('Enter Wistia Video Id')
                        // ->requiredUnless('resource_file_type', 'video')
                            ->hidden(fn(Get $get) => $get('resource_file_type') == "image"),
                        FileUpload::make('background_image')
                            ->label('Please Select Header Image')
                        // ->requiredUnless('resource_file_type', 'image')
                            ->hidden(fn(Get $get) => $get('resource_file_type') == "video")
                        // ->disk('s3')
                        // ->directory('form-attachments'),
                            ->acceptedFileTypes(['image/png', 'image/jpeg'])
                            ->image(),
                        FileUpload::make('frontend')
                            ->label('Select Featured Image or GIF')
                        // ->disk('s3')
                        // ->directory('form-attachments'),
                        // ->required()
                            ->acceptedFileTypes(['image/png', 'image/jpeg'])
                            ->image(),
                        Textarea::make('hash_tag')
                            ->label('Hashtag(#)'),
                        // Select::make('min_age')
                        //     ->label('Minimum Age:')
                        //     ->options(
                        //         self::getAgeArray()
                        //     )->native(false),
                        // Select::make('max_age')
                        //     ->label('Maximum Age:')
                        //     ->options(
                        //         self::getAgeArray()
                        //     )->native(false),
                        Select::make('medication_protocol_stage')
                            ->label('Medication Protocol Stage:')
                            ->live()
                            ->options(
                                MedicationProtocolStage::where("is_delete", "=", "0")
                                    ->get()
                                    ->pluck('protocol_name', 'id')
                            )->native(false),
                        TextInput::make('medication_protocol_stage_day')
                            ->placeholder('Medication Protocol Stage Days:')
                            ->label('Medication Protocol Stage Days')
                            ->hidden(fn(Get $get) => !empty($get('medication_protocol_stage'))),
                        Select::make('medication_use')
                            ->label('Medication Use:')
                            ->live()
                            ->options(MedicationUseType::where("is_delete", "=", "0")
                                    ->get()
                                    ->pluck('name', 'medication_use_id'))
                            ->native(false),

                        Group::make()->schema([
                            TextInput::make('medication_use_day')
                                ->placeholder('Medication Use Days:')
                                ->label('Medication Use Days')
                                ->numeric()
                                ->integer()
                                ->hidden(fn(Get $get) => empty($get('medication_use'))),
                            TextInput::make('medication_use_end_days')
                                ->placeholder('Medication End Days:')
                                ->label('Medication End Days')
                                ->numeric()
                                ->integer()
                                ->hidden(fn(Get $get) => empty($get('medication_use'))),
                        ]),
                        Repeater::make('cycle_type_repeater')
                            ->label('Add Cycle Type')
                            ->schema([
                                Select::make('cycle_type')
                                    ->options([
                                        "IVF/ICSI + Fresh Transfer" => "IVF/ICSI + Fresh Transfer",
                                        "FET" => "FET",
                                        "IVF/ICSI" => "IVF/ICSI",
                                        "Egg Freezing" => "Egg Freezing",
                                        "IUI" => " IUI",
                                        "Medicated Cycle" => "Medicated Cycle",
                                        "ERA/Mock FET" => "ERA/Mock FET",
                                    ])
                                    ->live(),
                                // Group::make([
                                //     Select::make('cycle_type')
                                //         ->label('SELECT DAY TYPE')
                                //         ->options([
                                //             "IVF/ICSI + Fresh Transfer" => "IVF/ICSI + Fresh Transfer",
                                //             "FET" => "FET",
                                //             "IVF/ICSI" => "IVF/ICSI",
                                //             "Egg Freezing" => "Egg Freezing",
                                //             "IUI" => " IUI",
                                //             "Medicated Cycle" => "Medicated Cycle",
                                //             "ERA/Mock FET" => "ERA/Mock FET",
                                //         ]),
                                //     TextInput::make('field_2'),
                                // ])->visible(fn(Get $get): bool => !empty($get('cycle_type'))),
                            ])
                            ->reorderable(false)
                        // ->collapsed()
                        ,
                    ]),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('resource_id'),
                TextColumn::make('topic_name'),
                TextColumn::make('description'),
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
            'index' => Pages\ListInsights::route('/'),
            'create' => Pages\CreateInsight::route('/create'),
            'edit' => Pages\EditInsight::route('/{record}/edit'),
        ];
    }

}
