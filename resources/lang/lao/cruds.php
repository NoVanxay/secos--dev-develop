<?php

return [
    'userManagement'      => [
        'title'          => 'ຈັດການຜູ້ໃຊ້',
        'title_singular' => 'ຈັດການຜູ້ໃຊ້',
    ],
    'permission'          => [
        'title'          => 'ການອະນຸຍາດ',
        'title_singular' => 'ການອະນຸຍາດ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'title'             => 'ຫົວຂໍ້',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                => [
        'title'          => 'ໜ້າທີ່',
        'title_singular' => 'ໜ້າທີ່',
        'fields'         => [
            'id'                 => 'ລຳດັບ',
            'id_helper'          => ' ',
            'title'              => 'ຫົວຂໍ້',
            'title_helper'       => ' ',
            'permissions'        => 'ການອະນຸຍາດ',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'faqManagement'       => [
        'title'          => 'ການຈັດການ FAQ',
        'title_singular' => 'ການຈັດການ FAQ',
    ],
    'faqCategory'         => [
        'title'          => 'ປະເພດຄຳຖາມ',
        'title_singular' => 'ປະເພດຄຳຖາມ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'category'          => 'ປະເພດຄຳຖາມ',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion'         => [
        'title'          => 'ຄຳຖາມ',
        'title_singular' => 'ຄຳຖາມ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'category'          => 'ປະເພດຄຳຖາມ',
            'category_helper'   => ' ',
            'question'          => 'ຄຳຖາມ',
            'question_helper'   => ' ',
            'answer'            => 'ຄຳຕອບ',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'user'                => [
        'title'          => 'ຜູ້ໃຊ້ງານ',
        'title_singular' => 'ຜູ້ໃຊ້ງານ',
        'fields'         => [
            'id'                           => 'ລຳດັບ',
            'id_helper'                    => ' ',
            'name'                         => 'ຊື່',
            'name_helper'                  => ' ',
            'email'                        => 'ອີເມລ',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'ຢືນຢັນອີເມລ',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'ລະຫັດຜ່ານ',
            'password_helper'              => ' ',
            'roles'                        => 'ສະຖານະ',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'last_name'                    => 'ນາມສະກຸນ',
            'last_name_helper'             => ' ',
            'gender'                       => 'ເພດ',
            'gender_helper'                => ' ',
            'date_of_birth'                => 'ວັນເດືອນປີເກີດ',
            'date_of_birth_helper'         => ' ',
            'village'                      => 'ບ້ານ',
            'village_helper'               => ' ',
            'district'                     => 'ນະຄອນ/ເມືອງ',
            'district_helper'              => ' ',
            'province'                     => 'ແຂວງ',
            'province_helper'              => ' ',
            'phone_no'                     => 'ເບີໂທລະສັບ',
            'phone_no_helper'              => ' ',
        ],
    ],
    'annoucement'         => [
        'title'          => 'ແຈ້ງການ',
        'title_singular' => 'ແຈ້ງການ',
        'fields'         => [
            'id'                 => 'ລຳດັບ',
            'id_helper'          => ' ',
            'annoucement'        => 'ແຈ້ງການ',
            'annoucement_helper' => ' ',
            'name'               => 'ຊື່',
            'name_helper'        => ' ',
            'number'             => 'ເລກທີ່',
            'number_helper'      => ' ',
            'short_name'         => 'ຕົວຫຍໍ້',
            'short_name_helper'  => ' ',
            'allow_date'         => 'ລົງວັນທີ',
            'allow_date_helper'  => ' ',
            'description'        => 'ຄຳອະທິບາຍ',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'policy'              => [
        'title'          => 'ນິຕິກຳ',
        'title_singular' => 'ນິຕິກຳ',
        'fields'         => [
            'id'                 => 'ລຳດັບ',
            'id_helper'          => ' ',
            'policy'             => 'ນິຕິກຳ',
            'policy_helper'      => ' ',
            'name'               => 'ຊື່',
            'name_helper'        => ' ',
            'lavel_no'           => 'ເລກທີ',
            'lavel_no_helper'    => ' ',
            'allow_date'         => 'ລົງວັນທີ່',
            'allow_date_helper'  => ' ',
            'description'        => 'ຄຳອະທິບາຍ',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'download'            => [
        'title'          => 'ດາວໂຫລດ',
        'title_singular' => 'ດາວໂຫລດ',
    ],
    'textbook'            => [
        'title'          => 'ແບບຮຽນ',
        'title_singular' => 'ແບບຮຽນ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'textbook'          => 'ແບບຮຽນ',
            'textbook_helper'   => ' ',
            'name'              => 'ຊື່',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'manual'              => [
        'title'          => 'ຄູ່ມືຄູ',
        'title_singular' => 'ຄູ່ມືຄູ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'manual'            => 'ຄູ່ມືຄູ',
            'manual_helper'     => ' ',
            'name'              => 'ຊື່',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'template'            => [
        'title'          => 'ຮ່າງເອກະສານ',
        'title_singular' => 'ຮ່າງເອກະສານ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'template'          => 'ຮ່າງເອກະສານ',
            'template_helper'   => ' ',
            'name'              => 'ຊື່',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'bookManagement'      => [
        'title'          => 'ການຈັດການໜັງສື',
        'title_singular' => 'ການຈັດການໜັງສື',
    ],
    'category'            => [
        'title'          => 'ປະເພດ',
        'title_singular' => 'ປະເພດ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'category'          => 'ປະເພດ',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'book'                => [
        'title'          => 'ໜັງສື',
        'title_singular' => 'ໜັງສື',
        'fields'         => [
            'id'                 => 'ລຳດັບ',
            'id_helper'          => ' ',
            'book'               => 'ໜັງສື',
            'book_helper'        => ' ',
            'name'               => 'ຊື່',
            'name_helper'        => ' ',
            'category'           => 'ປະເພດ',
            'category_helper'    => ' ',
            'publisher'          => 'ຜະລິດໂດຍ',
            'publisher_helper'   => ' ',
            'page'               => 'ຫນ້າ',
            'page_helper'        => ' ',
            'isbn'               => 'ISBN',
            'isbn_helper'        => ' ',
            'price'              => 'ລາຄາ',
            'price_helper'       => ' ',
            'photo'              => 'ຮູບ [ 215 × 285 pixels ]',
            'photo_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'schoolManagement'    => [
        'title'          => 'ການຈັດການໂຮງຮຽນ',
        'title_singular' => 'ການຈັດການໂຮງຮຽນ',
    ],
    'school'              => [
        'title'          => 'ໂຮງຮຽນ',
        'title_singular' => 'ໂຮງຮຽນ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'school'            => 'ໂຮງຮຽນ',
            'school_helper'     => ' ',
            'village'           => 'ບ້ານ',
            'village_helper'    => ' ',
            'district'          => 'ນະຄອນ/ເມືອງ',
            'district_helper'   => ' ',
            'province'          => 'ແຂວງ',
            'province_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'classRoom'           => [
        'title'          => 'ຫ້ອງຮຽນ',
        'title_singular' => 'ຫ້ອງຮຽນ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'class_room'        => 'ຫ້ອງຮຽນ',
            'class_room_helper' => ' ',
            'school'            => 'ໂຮງຮຽນ',
            'school_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subject'             => [
        'title'          => 'ວິຊາ',
        'title_singular' => 'ວິຊາ',
        'fields'         => [
            'id'                  => 'ລຳດັບ',
            'id_helper'           => ' ',
            'subject_code'        => 'ລະຫັດວິຊາ',
            'subject_code_helper' => ' ',
            'subject'             => 'ຫົວຂໍ້',
            'subject_helper'      => ' ',
            'classroom'           => 'ຫ້ອງຮຽນ',
            'classroom_helper'    => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'academicYear'        => [
        'title'          => 'ສົກຮຽນ',
        'title_singular' => 'ສົກຮຽນ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'title'             => 'ຫົວຂໍ້',
            'title_helper'      => ' ',
            'start_date'        => 'ເລິ່ມເມື່ອ',
            'start_date_helper' => ' ',
            'end_date'          => 'ສິ້ນສຸດເມື່ອ',
            'end_date_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'student'             => [
        'title'          => 'ນັກຮຽນ',
        'title_singular' => 'ນັກຮຽນ',
        'fields'         => [
            'id'                    => 'ລຳດັບ',
            'id_helper'             => ' ',
            'st_code'               => 'ລະຫັດນັກຮຽນ',
            'st_code_helper'        => ' ',
            'first_name'            => 'ຊື່',
            'first_name_helper'     => ' ',
            'last_name'             => 'ນາມສະກຸນ',
            'last_name_helper'      => ' ',
            'gender'                => 'ເພດ',
            'gender_helper'         => ' ',
            'date_of_birth'         => 'ວັນເດືອນປີເກີດ',
            'date_of_birth_helper'  => ' ',
            'village'               => 'ບ້ານ',
            'village_helper'        => ' ',
            'district'              => 'ນະຄອນ/ເມືອງ',
            'district_helper'       => ' ',
            'province'              => 'ແຂວງ',
            'province_helper'       => ' ',
            'father_name'           => 'ຊື່ພໍ່',
            'father_name_helper'    => ' ',
            'father_no'             => 'ເບີໂທພໍ່',
            'father_no_helper'      => ' ',
            'mother_name'           => 'ຊື່ແມ່',
            'mother_name_helper'    => ' ',
            'mother_no'             => 'ເບີໂທແມ່',
            'mother_no_helper'      => ' ',
            'classroom'             => 'ຫ້ອງຮຽນ',
            'classroom_helper'      => ' ',
            'school'                => 'ໂຮງຮຽນ',
            'school_helper'         => ' ',
            'end_from'              => 'ຈົບຈາກ',
            'end_from_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'academic_years'        => 'ສົກຮຽນ',
            'academic_years_helper' => ' ',
            'photo'                 => 'ຮູບ',
            'photo_helper'          => ' ',
            'phone_no'              => 'ເບີໂທລະສັບ',
            'phone_no_helper'       => ' ',
            'note'                  => 'ໝາຍເຫດ',
            'note_helper'           => ' ',
            'email'                 => 'ອີເມລ',
            'email_helper'          => ' ',
            'password'              => 'ລະຫັດຜ່ານ',
            'password_helper'       => ' ',
            'roles'                 => 'ສະຖານະ',
            'roles_helper'          => ' ',
            'remember_token'        => 'Remember Token',
            'remember_token_helper' => ' ',
        ],
    ],
    'historyAdminTeacher' => [
        'title'          => 'ຊີວະປະຫວັດບັນພະຊິດ-ບໍລິຫານ',
        'title_singular' => 'ຊີວະປະຫວັດບັນພະຊິດ-ບໍລິຫານ',
        'fields'         => [
            'id'                         => 'ລຳດັບ',
            'id_helper'                  => ' ',
            'title'                      => 'ຫົວຂໍ້',
            'title_helper'               => ' ',
            'photo'                      => 'ຮູບ 3*4 [ 288 x 384 pixels ]',
            'photo_helper'               => ' ',
            'fist_name'                  => 'ຊື່',
            'fist_name_helper'           => ' ',
            'last_name'                  => 'ນາມສະກຸນ',
            'last_name_helper'           => ' ',
            'gender'                     => 'ເພດ',
            'gender_helper'              => ' ',
            'eng_name'                   => 'Name',
            'eng_name_helper'            => ' ',
            'eng_last'                   => 'Last Name',
            'eng_last_helper'            => ' ',
            'date_of_birth'              => 'ວັນເດືອນປີເກີດ',
            'date_of_birth_helper'       => ' ',
            'text'                       => 'ຂຽນເປັນຕົວໜັງສື',
            'text_helper'                => ' ',
            'tribes'                     => 'ຊົນເຜົ່າ',
            'tribes_helper'              => ' ',
            'religion'                   => 'ສາສະໜາ',
            'religion_helper'            => ' ',
            'pabbajja'                   => 'ບັນພະຊາຫຼືອຸປະສົມບົດ',
            'pabbajja_helper'            => ' ',
            'identification_card'        => 'ບັດປະຈຳຕົວຫຼືໜັງສືສຸດທິ',
            'identification_card_helper' => ' ',
            'province_birth'             => 'ແຂວງເກີດ',
            'province_birth_helper'      => ' ',
            'district_birth'             => 'ນະຄອນ/ເມືອງເກີດ',
            'district_birth_helper'      => ' ',
            'village_birth'              => 'ບ້ານເກີດ',
            'village_birth_helper'       => ' ',
            'current_province'           => 'ປະຈຸບັນຢູ່ແຂວງ',
            'current_province_helper'    => ' ',
            'current_district'           => 'ເມືອງ',
            'current_district_helper'    => ' ',
            'current_village'            => 'ບ້ານ',
            'current_village_helper'     => ' ',
            'temple'                     => 'ວັດ',
            'temple_helper'              => ' ',
            'phone_no_1'                 => 'ເບີໂທລະສັບ 1',
            'phone_no_1_helper'          => ' ',
            'phone_no_2'                 => 'ເບີໂທລະສັບ 2',
            'phone_no_2_helper'          => ' ',
            'office_phone'               => 'ເບີໂທຫ້ອງການ',
            'office_phone_helper'        => ' ',
            'census'                     => 'ສຳມະໂນວັດ',
            'census_helper'              => ' ',
            'allow_date'                 => 'ລົງວັນທີ',
            'allow_date_helper'          => ' ',
            'live_at'                    => 'ສັງກັດຢູ່',
            'live_at_helper'             => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'contentManagement'   => [
        'title'          => 'ການຈັດການເນື້ອຫາ',
        'title_singular' => 'ການຈັດການເນື້ອຫາ',
    ],
    'content'             => [
        'title'          => 'ເນື້ອຫາ',
        'title_singular' => 'ເນື້ອຫາ',
        'fields'         => [
            'id'                => 'ລຳດັບ',
            'id_helper'         => ' ',
            'users'             => 'ຜູ້ໃຊ້',
            'users_helper'      => ' ',
            'title'             => 'ຫົວຂໍ້',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'category'          => 'ປະເພດ',
            'category_helper'   => ' ',
            'content'           => 'ເນື້ອຫາ',
            'content_helper'    => ' ',
            'date'              => 'ເມື່ອ',
            'date_helper'       => ' ',
        ],
    ],
    'contentCategory'     => [
        'title'          => 'ປະເພດເນື້ອຫາ',
        'title_singular' => 'ປະເພດເນື້ອຫາ',
        'fields'         => [
            'id'                      => 'ລຳດັບ',
            'id_helper'               => ' ',
            'content_category'        => 'ປະເພດເນື້ອຫາ',
            'content_category_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'auditLog'            => [
        'title'          => 'ບັນທຶກການເຄື່ອນໄຫວ',
        'title_singular' => 'ບັນທຶກການເຄື່ອນໄຫວ',
        'fields'         => [
            'id'                  => 'ລຳດັບ',
            'id_helper'           => ' ',
            'description'         => 'ຄຳອະທິບາຍ',
            'description_helper'  => ' ',
            'subject_id'          => 'ID ຫົວຂໍ້',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'ປະເພດຫົວຂໍ້',
            'subject_type_helper' => ' ',
            'user_id'             => 'ID ຜູ້ໃຊ້',
            'user_id_helper'      => ' ',
            'properties'          => 'ຄຸນສົມບັດ',
            'properties_helper'   => ' ',
            'host'                => 'ໂຮສ',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
];
