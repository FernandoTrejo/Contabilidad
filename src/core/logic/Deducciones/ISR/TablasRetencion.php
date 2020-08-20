<?php

const tabla_retencion_mensual = [
  'tramo_1' => [ //tramo 1
    'inicio' => 0.01,
    'fin' => 472,
    'sobre' => 0,
    'porcentaje' => 0,
    'cuota' => 0
  ],
  'tramo_2' => [ //tramo 2
    'inicio' => 472.01,
    'fin' => 895.24,
    'sobre' => 472,
    'porcentaje' => 0.10,
    'cuota' => 17.67
  ],
  'tramo_3' => [ //tramo 3
    'inicio' => 895.25,
    'fin' => 2038.10,
    'sobre' => 895.24,
    'porcentaje' => 0.20,
    'cuota' => 60
  ],
  'tramo_4' => [ //tramo 4
    'inicio' => 2038.11,
    'fin' => "null",
    'sobre' => 2038.10,
    'porcentaje' => 0.30,
    'cuota' => 288.57
  ]
];

const tabla_recalculo_junio = [
  'tramo_1' => [ //tramo 1
    'inicio' => 0.01,
    'fin' => 2832,
    'sobre' => 0,
    'porcentaje' => 0,
    'cuota' => 0
  ],
  'tramo_2' => [ //tramo 2
    'inicio' => 2832.01,
    'fin' => 5371.44,
    'sobre' => 2832,
    'porcentaje' => 0.10,
    'cuota' => 106.20
  ],
  'tramo_3' => [ //tramo 3
    'inicio' => 5371.45,
    'fin' => 12228.60,
    'sobre' => 5371.44,
    'porcentaje' => 0.20,
    'cuota' => 360
  ],
  'tramo_4' => [ //tramo 4
    'inicio' => 12228.61,
    'fin' => "null",
    'sobre' => 12228.60,
    'porcentaje' => 0.30,
    'cuota' => 1731.42
  ]
];

const tabla_recalculo_diciembre = [
  'tramo_1' => [ //tramo 1
    'inicio' => 0.01,
    'fin' => 5664,
    'sobre' => 0,
    'porcentaje' => 0,
    'cuota' => 0
  ],
  'tramo_2' => [ //tramo 2
    'inicio' => 5664.01,
    'fin' => 10742.86,
    'sobre' => 5664,
    'porcentaje' => 0.10,
    'cuota' => 212.12
  ],
  'tramo_3' => [ //tramo 3
    'inicio' => 10742.87,
    'fin' => 24457.14,
    'sobre' => 10742.86,
    'porcentaje' => 0.20,
    'cuota' => 720
  ],
  'tramo_4' => [ //tramo 4
    'inicio' => 24457.15,
    'fin' => "null",
    'sobre' => 24457.14,
    'porcentaje' => 0.30,
    'cuota' => 3462.86
  ]
];


