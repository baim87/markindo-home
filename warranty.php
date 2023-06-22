<?php $title = 'warranty'; include "includes/header.php" ?>
<?php include "includes/navbar.php" ?>

<style>
    .kontener {
  backdrop-filter: blur(16px) saturate(180%);
  -webkit-backdrop-filter: blur(16px) saturate(180%);
  background-color: rgba(17, 25, 40, 0.25);
  border-radius: 12px;
  border: 1px solid rgba(255, 255, 255, 0.125);  
  padding: 38px;  
  filter: drop-shadow(0 30px 10px rgba(0,0,0,0.125));
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content:center;
  text-align: center;
  
}

.wreper {
  width: 100%;
  height: 100%;
  
}

.banner-image {
  background-image: url(https://images.unsplash.com/photo-1641326201918-3cafc641038e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80);
  background-position: center;
  background-size: cover;
  height: 300px;
  width: 100%;
  border-radius: 12px;
  border: 1px solid rgba(255,255,255, 0.255)
}

h1{
  font-family: 'Righteous', sans-serif;
  color: rgba(255,255,255,0.98);
  text-transform: uppercase;
  font-size: 2.4rem;
}

p {
  color: #fff;
  font-family: 'Lato', sans-serif;
  text-align: center;
  font-size: 0.8rem;
  line-height: 150%;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.button-wreper{
  margin-top: 18px;
}

.btn {
  border: none;
  padding: 12px 24px;
  border-radius: 24px;
  font-size: 12px;
  font-size: 0.8rem;  
  letter-spacing: 2px;  
  cursor: pointer;
}

.btn + .btn {
  margin-left: 10px;
}

.outline {
  background: transparent;
  color: rgba(0, 212, 255, 0.9);
  border: 1px solid rgba(0, 212, 255, 0.6);
  transition: all .3s ease;
  
}

.outline:hover{
  transform: scale(1.125);
  color: rgba(255, 255, 255, 0.9);
  border-color: rgba(255, 255, 255, 0.9);
  transition: all .3s ease;  
}

.fill {
  background: rgba(0, 212, 255, 0.9);
  color: rgba(255,255,255,0.95);
  filter: drop-shadow(0);
  font-weight: bold;
  transition: all .3s ease; 
}

.fill:hover{
  transform: scale(1.125);  
  border-color: rgba(255, 255, 255, 0.9);
  filter: drop-shadow(0 10px 5px rgba(0,0,0,0.125));
  transition: all .3s ease;    
}
</style>

<main class="main">
    <section class="home section" id="home">
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form name="form_main" class="contactForm" id="contactForm">
                    <fieldset style="border:0px">
                       <div class="formbold-mb-5">
                            <label for="warranty" class="formbold-form-label" id="warranty"> Claim your Warranty </label>
                            <input
                            type="text"
                            name="warranty"
                            id="user_code"
                            placeholder="Input the warranty here"
                            class="formbold-form-input"
                            onchange="fetchData()"
                            />
                        </div>
                     </fieldset>
                </form>
                <div>
                    <button class="formbold-btn">Submit</button>
                </div>
                <p id="hasil"></p>
            </div>
        </div>
    </section>
    <!-- hasil -->
    <div class="kontener" id="konten">
        <div class="wreper">
            <div class="row">
                <div class="kiri" style="display:block; float:left;" id="name_customer"></div>
                <div class="kanan" id="phone_number"></div>
            </div>
            <h1 id="mobil"></h1>
            <h2 style="text-transform: uppercase;" id="plat"></h2>
            <p id="packages"></p>
        </div>
        <div class="button-wreper"> 
            <button class="btn fill">CLAIM</button>
            <p id="invoice_no"></p>
        </div>
    </div>
</main>
 
<script type="text/javascript">
    const fetchData = async (id) => {
      let user_code = document.getElementById("user_code").value;
      try {
        const res = await fetch(`https://markautodetailing.com/mos/wp-json/mark-order-system/v1/GetUserMaintenance?user_code=${user_code}`, {
          method: "GET",
          headers: {
            Authorization: "Basic bW9zOm9yZGVyX3N5c3RlbV9hY2Nlc3M",
            "Content-Type": "application/json",
          },
        });
        const data = await res.json();

        if (data.code === 200) {
          const tempPackages = data.b.packages.map((e) => e.PackageName);

          const newData = {
            invoice_no: data.payments.InvoiceNo,
            name_customer: data.payments.CustName,
            mobil: data.payments.CarType,
            plat: data.payments.CarNo,
            phone_number: data.payments.CustPhone,
            packages: tempPackages,
          };

          document.getElementById("name_customer").innerHTML = newData.name_customer;
          document.getElementById("invoice_no").innerHTML = '#' + newData.invoice_no;
          document.getElementById("phone_number").innerHTML = newData.phone_number;
          document.getElementById("mobil").innerHTML = newData.mobil;
          document.getElementById("plat").innerHTML = newData.plat;

          newData.packages.forEach((element) => {
            document.getElementById("packages").innerHTML += element + "<br>";
          });
        } else if (data.code === "rest_forbidden") {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kode Warranty Tidak Terdaftar!',
            })
        }
      } catch (e) {
        console.error(e);
      }
    };

    function Sembunyi() {
    var x = document.getElementById("btn fill");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }
  </script>
 
    <?php include "includes/footer.php" ?>