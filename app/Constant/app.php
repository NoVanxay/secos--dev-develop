<?php

namespace App\Constant;

use App\Models\User;

class App
{
const DISTRICT_SELECT = [

    'Chanthabuly'  => 'ຈັນທະບູລີ',
    'Sikhottabong'  => 'ສີໂຄດຕະບອງ',
    'Xaysettha'  => 'ໄຊເສດຖາ',
    'Champasak'  => 'ຈຳປາສັກ',
    'Naxaythong'  => 'ນາຊາຍທອງ',
    'Xaythany'  => 'ໄຊທານີ',
    'Hatxayfong'  => 'ຫາດຊາຍຟອງ',
    'Sangthong'  => 'ສັງທອງ',
    'Oudomxay'  => 'ອຸດົມໄຊ',
    'Phongsaly' => 'ພົງສາລີ',
    'Salavan' => 'ສາລະວັນ',
    'Savannakhet' => 'ສະຫວັນນະເຂດ',
    'Vientiane' => 'ນະຄອນຫຼວງວຽງຈັນ',
    'Vientiane Prefecture' => 'ວຽງຈັນ',
    'Xaignabouli' => 'ໄຊຍະບູລີ',
    'Sekong' => 'ເຊກອງ',
    'Xaisomboun' => 'ໄຊສົມບູນ',
    'Xiangkhouang' => 'ຊຽງຂວາງ',
    'Attapeu'  => 'ອັດຕະປື',
    'Bokeo'  => 'ບໍ່ແກ້ວ',
    'Bolikhamxai'  => 'ບໍລິຄຳໄຊ',
    'Champasak'  => 'ຈຳປາສັກ',
    'Houaphanh'  => 'ຫົວພັນ',
    'Khammouane'  => 'ຄຳມ່ວນ',
    'Luang Namtha'  => 'ຫຼວງນ້ຳທາ',
    'Luang Prabang'  => 'ຫຼວງພະບາງ',
    'Oudomxay'  => 'ອຸດົມໄຊ',
    'Phongsaly' => 'ພົງສາລີ',
    'Salavan' => 'ສາລະວັນ',
    'Savannakhet' => 'ສະຫວັນນະເຂດ',
    'Vientiane' => 'ນະຄອນຫຼວງວຽງຈັນ',
    'Vientiane Prefecture' => 'ວຽງຈັນ',
    'Xaignabouli' => 'ໄຊຍະບູລີ',
    'Sekong' => 'ເຊກອງ',
    'Xaisomboun' => 'ໄຊສົມບູນ',
    'Xiangkhouang' => 'ຊຽງຂວາງ',
    'Attapeu'  => 'ອັດຕະປື',
    'Bokeo'  => 'ບໍ່ແກ້ວ',
    'Bolikhamxai'  => 'ບໍລິຄຳໄຊ',
    'Champasak'  => 'ຈຳປາສັກ',
    'Houaphanh'  => 'ຫົວພັນ',
    'Khammouane'  => 'ຄຳມ່ວນ',
    'Luang Namtha'  => 'ຫຼວງນ້ຳທາ',
    'Luang Prabang'  => 'ຫຼວງພະບາງ',
    'Oudomxay'  => 'ອຸດົມໄຊ',
    'Phongsaly' => 'ພົງສາລີ',
    'Salavan' => 'ສາລະວັນ',
    'Savannakhet' => 'ສະຫວັນນະເຂດ',
    'Vientiane' => 'ນະຄອນຫຼວງວຽງຈັນ',
    'Vientiane Prefecture' => 'ວຽງຈັນ',
    'Xaignabouli' => 'ໄຊຍະບູລີ',
    'Sekong' => 'ເຊກອງ',
    'Xaisomboun' => 'ໄຊສົມບູນ',
    'Xiangkhouang' => 'ຊຽງຂວາງ',


    ];


const PROVINCE_SELECT = [
        'Attapeu'  => 'ອັດຕະປື',

        'Bokeo'  => 'ບໍ່ແກ້ວ',
        'Bolikhamxai'  => 'ບໍລິຄຳໄຊ',
        'Champasak'  => 'ຈຳປາສັກ',
        'Houaphanh'  => 'ຫົວພັນ',
        'Khammouane'  => 'ຄຳມ່ວນ',
        'Luang Namtha'  => 'ຫຼວງນ້ຳທາ',
        'Luang Prabang'  => 'ຫຼວງພະບາງ',
        'Oudomxay'  => 'ອຸດົມໄຊ',
        'Phongsaly' => 'ພົງສາລີ',
        'Salavan' => 'ສາລະວັນ',
        'Savannakhet' => 'ສະຫວັນນະເຂດ',
        'Vientiane' => 'ນະຄອນຫຼວງວຽງຈັນ',
        'Vientiane Prefecture' => 'ວຽງຈັນ',
        'Xaignabouli' => 'ໄຊຍະບູລີ',
        'Sekong' => 'ເຊກອງ',
        'Xaisomboun' => 'ໄຊສົມບູນ',
        'Xiangkhouang' => 'ຊຽງຂວາງ',
    ];

const GENDER_RADIO = [
        'Monk' => 'ພຣະ',
        'Novice' => 'ສ.ນ',
        'Male' => 'ຊາຍ',
        'Female' => 'ຍິງ',
    ];

const RELIGION_SELECT = [
        'Buddhist' => 'ພຸດ',
        'Cristian' => 'ຄຣິສ',
        'Islam' => 'ອິສລາມ',
        'Hindu' => 'ຮິນດູ',
        'Other' => 'ອື່ນໆ',
        'None religion' => 'ບໍ່ມີ',
    ];
}
