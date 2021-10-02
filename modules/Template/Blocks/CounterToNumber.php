<?php


    namespace Modules\Template\Blocks;


    class CounterToNumber extends BaseBlock
    {
        function __construct()
        {
            $this->setOptions([
                'settings' => [
                    [
                        'id'        => 'title',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Title')
                    ],
                    [
                        'id'        => 'sub_title',
                        'type'      => 'input',
                        'inputType' => 'text',
                        'label'     => __('Sub Title')
                    ],
                    [
                        'id'          => 'list_item',
                        'type'        => 'listItem',
                        'label'       => __('List Item(s)'),
                        'title_field' => 'title',
                        'settings'    => [
                            [
                                'id'        => 'title',
                                'type'      => 'input',
                                'inputType' => 'text',
                                'label'     => __('Title')
                            ],
                            [
                                'id'        => 'number',
                                'type'      => 'input',
                                'inputType' => 'text',
                                'label'     => __('Number')
                            ],
                            [
                                'id'    => 'suffix',
                                'type'      => 'input',
                                'inputType' => 'text',
                                'label' => __('Suffix')
                            ],
                        ]
                    ],

                ],
                'category'=>__("Other Block")
            ]);
        }

        public function getName()
        {
            return __('Counter to number');
        }

        public function content($model = [])
        {
            return view('Template::frontend.blocks.counter-to-number.index', $model);
        }
    }