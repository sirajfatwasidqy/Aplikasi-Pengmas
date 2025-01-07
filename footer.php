<?php
// Ambil data footer dari database
$query_footer = "SELECT * FROM footer_info WHERE id = 1";
$result_footer = mysqli_query($conn, $query_footer);
$row_footer = mysqli_fetch_assoc($result_footer);

// Periksa apakah data ada
$twitter_url = isset($row_footer['twitter_url']) ? $row_footer['twitter_url'] : '#';
$facebook_url = isset($row_footer['facebook_url']) ? $row_footer['facebook_url'] : '#';
$instagram_url = isset($row_footer['instagram_url']) ? $row_footer['instagram_url'] : '#';
$website_name_footer = isset($row_footer['website_name']) ? $row_footer['website_name'] : 'Nama Website Tidak Tersedia';
$slogan_footer = isset($row_footer['slogan']) ? $row_footer['slogan'] : 'Slogan Tidak Tersedia';
?>

<footer>
    <div class="social-media">
        <p>Twitter: <a href="<?php echo $twitter_url; ?>">@UPJ_Bintaro</a></p>
        <p>Facebook: <a href="<?php echo $facebook_url; ?>">@Universitas Pembangunan Jaya ( UPJ )</a></p>
        <p>Instagram: <a href="<?php echo $instagram_url; ?>">@lp2m_upj</a></p>
    </div>
    <div class="copyright">
        &copy; Copyright 2024. All Rights Reserved.
    </div>
    <div>
        <h3><?php echo $website_name_footer; ?></h3>
        <p><?php echo $slogan_footer; ?></p>
    </div>
</footer>
