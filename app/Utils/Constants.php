<?php
const FOR_SELL = 0;
const FOR_RENT = 1;
const FOR_INVEST = 2;

// 0 = > no direction
const EAST = 1;
const WEST = 2;
const SOUTH = 3;
const NORTH = 4;
const SOUTH_WEST = 5;
const SOUTH_EAST = 6;
const NORTH_WEST = 7;
const NORTH_EAST = 8;

// 0 => no video
const YOUTUBE = 1;
const TIKTOK = 2;

const ACTIVE = 0;
const INACTIVE = 1;

const TRANS_IN = 0;
const TRANS_OUT = 1;

const TRANSACTION_PENDING = 0;
const TRANSACTION_SUCCESS = 1;
const TRANSACTION_FAILED = 2;

const PRICE = [
    'tin_thuong' => 500,
    'VIP1' => 10000,
    'VIP2' => 20000,
    'VIP3' => 30000,
];

const EXPRIRED_MINUTES = 30; // minutes

const POST_FEE = 2000;

const UNVERIFIED = 0;
const VERIFIED = 1;

const LOCAL_HOST = 'http://127.0.0.1:8000';
const PRODUCTION_HOST = '';