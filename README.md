ວິທີການຕິດຕັ້ງ
ກະລຸນາກວດສອບການເຊື່ອຕໍ່ອິນເຕີເນັດ ເພາະໃນລະບົບນຳໃຊ້ CDN

ສິ່ງທີ່ຕ້ອງຕິດຕັ້ງລົງໃນຄອມພິວເຕີ້ 
1. Xampp ແນະນຳເວີຊັນ 3.2.4 (ພາຍໃນຈະມີ PHP 7.4.3 ແລະ mysql  Ver 15.1) ຫຼັງຈາກໂຫລດແລະຕິດຕັ້ງແລ້ວໃຫ້ກົດປຸ່ມ Start Aphache ແລະ Start Mysql ໄວ້
2. Composer ແນະນຳເວີຊັນ 2.0.8 
3. Node JS ແນະນຳເວີຊັນ 14.15.3

ໃຫ້ດາວໂຫລດໄຟລ໌ນີ້ໃນກິດຮັບ ຫລັງຈາກດາວໂຫລດຈາກກິດຮັບແລ້ວ
1. ສ້າງຖານຂໍ້ມູນຊື່ 'secos--dev-develop', ຊື່ຜູ້ໃຊ້ 'root', ລະຫັດຜ່ານ  '' ;
2. extract file ຫຼື ແຍກໄຟລ໌
3. ເປີດ cmd ແລ້ວໄປຫາບ່ອນເກັບໄຟທີ່ດາວໂຫລດ 

// ຕົວຢ່າງໃນຄອມນ້ອງເກັບໄວ້ຊ່ອງ D:\secos--dev-develop>

ພິມຄຳສັ່ງລຸ່ມນີ້
- npm install
- npm run prod
- composer install
- php aritsan key:generate
- php artisan migrate:fresh --seed
- php artisan serve
- ຖ້າເຈີເລກໄອພີ http://127.0.0.1:8000 ກອບເລກໄອພີແລະພັອດ ແລ້ວວ່າງຢູ່ Browser

ການເຂົ້າສູ່ລະບົບ

ຊື່ຜູ້ໃຊ້       'admin@admin.com'
ລະຫັດຜ່ານ    'password'
