$(document).ready( function () {
    $('#otbListview').DataTable({
        "searching": false, // ทำการเปิดปิดการใช้งาน Search
        "paging": false, // ทำการเปิดปิดการใช้งาน ตัวกำหนดrecord ในหน้า
        "lengthMenu": [ 1, 10, 50, 75, 100 ,300] // ตั้งค่าหน้าแสดง record หรือจะให้ pageLength เพื่อกำหนด record ที่จะแสดงในแต่ละหน้า
    });
} );