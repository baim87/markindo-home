<?php $title = 'Contact Us'; include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>
 
 
<main class="main">
    <section class="home section" id="home">
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form name="form_main" class="contactForm" id="contactForm">
                    <fieldset style="border:0px">
                        <div class="formbold-mb-5">
                            <label for="nama" class="formbold-form-label" id="nama"> Full Name </label>
                            <input
                            type="text"
                            name="nama"
                            id="nama"
                            placeholder="Full Name"
                            class="formbold-form-input"
                            />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="email" class="formbold-form-label" id="email"> Email Address </label>
                            <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Enter your email"
                            class="formbold-form-input"
                            />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="mobil" class="formbold-form-label" id="mobil"> Car </label>
                            <input
                            type="text"
                            name="mobil"
                            id="mobil"
                            placeholder="Enter your car. Contoh: BMW Z3, Fortuner"
                            class="formbold-form-input"
                            />
                        </div>
 
                        <div class="formbold-mb-5">
                        <label for="service" class="formbold-form-label" id="service">Service</label>
                            <select id="service" class="formbold-form-input">
                                <option value="default" disabled selected>Choose service</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Datang ke branch">Come to branch</option>
                                <option value="Home Service">Home service</option>
                            </select>
                        </div>
                        <div class="formbold-mb-5">
                        <label for="cabang" class="formbold-form-label" id="cabang">Cabang</label>
                            <select id="cabang" class="formbold-form-input">
                                <option value="default" disabled selected>Choose nearest branch</option>
                                <option value="Sunter">Sunter</option>
                                <option value="pondok Indah">Pondok Indah</option>
                                <option value="Gading Serpong">Gading Serpong</option>
                            </select>
                        </div>
                        <div class="formbold-mb-5">
                        <label for="produk" class="formbold-form-label">Products</label>
                            <select id="produk" class="formbold-form-input">
                                <option value="default" disabled selected>Choose products</option>
                                <option value="Stein PPF">Stein PPF</option>
                                <option value="Wrap">Colored wraps</option>
                                <option value="Coating">Coating</option>
                                <option value="vip">Interior Restoration</option>
                            </select>
                        </div>
                        <div class="flex flex-wrap formbold--mx-3">
                            <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5 w-full">
                                <label for="date" class="formbold-form-label"> Date </label>
                                <input
                                type="date"
                                name="date"
                                id="date"
                                class="formbold-form-input"
                                />
                            </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="time" class="formbold-form-label"> Time </label>
                                <input
                                type="time"
                                name="time"
                                id="time"
                                class="formbold-form-input"
                                />
                            </div>
                            </div>
                        </div>
                        <div class="formbold-mb-5">
                            <label for="pesan" class="formbold-form-label"> Messages </label>
                            <textarea name="pesan" class="formbold-form-input" id="pesan"></textarea>
                        </div>
                    </fieldset>
                </form>
                <div>
                    <button class="formbold-btn" onclick="generateLink();">Book Appointment</button>
                </div>
            </div>
        </div>
 
    </section>
</main>
 
<script>
    function generateLink() {
        let nama    = document.form_main.nama.value;
        let email   = document.form_main.email.value;
        let mobil   = document.form_main.mobil.value;
        let cabang  = document.form_main.cabang.value;
        let service = document.form_main.service.value;
        let produk = document.form_main.produk.value;
        let tanggal = document.form_main.date.value;
        let waktu = document.form_main.time.value;
        let pesan   = document.form_main.pesan.value;
        let url     = "https://wa.me/6281977388992";
        let end_url =
        `${url}?text=Halo, Mau booking *${produk}*.%0a *Nama*: ${nama}%0a *Email*: ${email}%0a *Mobil*: ${mobil}%0a *Cabang*: ${cabang}%0a *Booking date*: ${tanggal}%0a *Jam*: ${waktu}%0a *Service*: ${service}%0a *Pesan*: ${pesan}`;
        window.open(end_url, '_blank').focus();
    }
 
</script>
 
    <?php include "includes/footer.php" ?>