$wp_request_headers = array(
    'Authorization' => 'Basic ' . base64_encode( 'username:password' )
);
 
$wp_request_url = 'http://localserver/wordpress-api/wp-json/wp/v2/posts/52';
 
$wp_delete_post_response = wp_remote_request(
    $wp_request_url,
    array(
        'method'    => 'DELETE',
        'headers'   => $wp_request_headers
    )
);
 
echo wp_remote_retrieve_response_code( $wp_delete_post_response ) . ' ' . wp_remote_retrieve_response_message( $wp_delete_post_response );

http://absenku.com/profesional/biaya/
-------------------------------------
Jumlah Karyawan					20	30	100	250
Absensi Geo Tagging				
Manajemen Karyawan				
Manajemen Departemen				
Manajemen Ijin & Cuti				
Web & Mobile Apps				
Laporan Absensi per Karyawan				
Laporan Absensi per Departement				
Laporan Grafik Absensi				
Pengajuan Ijin dan Cuti				
Manajemen Shift				
Manajemen Lembur				
Informasi Gaji				
Update				
Panduan Pengguna				
Support	Chat	On Call	On Call	On Call
Masa Layanan	Lifetime	Min 6 Bulan	Min 6 Bulan	Min 6 Bulan