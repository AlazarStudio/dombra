<?php
function getSchema()
{
  return [
    'galery' => [
      'menuName' => 'Галерея',
      'fields'  => [
        'title' => [
          'name' => 'Название',
          'element' => 'input',
          'type' => 'text',
          'required' => false,
        ],

        'img' => [
          'name' => 'Картинки ',
          'element' => 'input',
          'type' => 'file',
          'required' => true,
        ],
      ],
    ],

  ];
}
