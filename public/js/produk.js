
function scrLaravel(image) {
    let link = `img/`+image;
    return link
}

function xshow(kategori_id, kategoriDipilih, merchant_id, merchantDipilih,nama_produk, cari) {
    var merchant2 = {
        "1": "KorTAIL",
        "2": "WarmingUP"
    };
    var merchant = ["Semua", merchant2[merchant_id]];

    if (cari.length == 0) {
        if (kategoriDipilih.length == 0) {
            if (merchant.includes(merchantDipilih)) {
                return true
            } else {
                return false
            }
        } else {
            if (merchant.includes(merchantDipilih) && kategoriDipilih.includes(kategori_id)) {
                return true
            } else {
                return false
            }
        }
    } else {
        if (nama_produk.toLowerCase().startsWith(cari.toLowerCase())) {
            if (kategoriDipilih.length == 0) {
                if (merchant.includes(merchantDipilih)) {
                    return true
                } else {
                    return false
                }
            } else {
                if (merchant.includes(merchantDipilih) && kategoriDipilih.includes(kategori_id)) {
                    return true
                } else {
                    return false
                }
            }
        }

    }
}

function oren(thisEl, kategori_id, kategoriDipilih) {
    if (kategoriDipilih.includes(kategori_id)) {
        let index = kategoriDipilih.indexOf(kategori_id);
        while (index !== -1) {
            kategoriDipilih.splice(index, 1);
            index = kategoriDipilih.indexOf(kategori_id);
        }
    } else {
        kategoriDipilih.push(kategori_id)
    }

    if (thisEl.classList.contains('bg-orenKortail')) {
        thisEl.classList.remove('bg-orenKortail')
    } else {
        thisEl.classList.add('bg-orenKortail')
    }
}

// ================================================================
// ================================================================

var keranjang = document.getElementById("keranjang");
var produkDipilih = new Object();
var keranjangKosong = document.getElementById("keranjangKosong");
var listKeranjang = document.getElementById("listKeranjang");

function krgJumlah(id){
    
    // for(let i = 0; i < produkDipilih.length; i++) {
    //     if (produkDipilih[i] === id) {
    //       produkDipilih.splice(i, 1);
    //       i--;
    //     }
    // }
    
    krg = parseInt(document.getElementById("jml-"+id).innerHTML) - 1

    if (parseInt(document.getElementById("jml-"+id).innerHTML) === 1) {
        console.log(id+": dihapus")
        var produkDihapus = document.getElementById("produk-"+id)
        produkDihapus.parentNode.removeChild(produkDihapus);
        delete produkDipilih[id]

        if (!keranjang.querySelector("input")) {
            keranjang.innerHTML = `
            <span id="keranjangKosong" class="text-sm">Keranjang masih kosong</span>
            `
        }
    } else {
        produkDipilih[id][0] = produkDipilih[id][0] -1;
        console.log(id+": dikurang 1")
        document.getElementById("jml-"+id).innerHTML = krg
    }
    console.log(produkDipilih)
    listKeranjang.value = JSON.stringify(produkDipilih)
}

function tambahKeKeranjang(id, nama, harga) {
    var keranjangKosong = document.getElementById("keranjangKosong");
    if (keranjang.contains(keranjangKosong)) {
        keranjang.removeChild(keranjangKosong)
    }

    // if (produkDipilih.includes(id)) {
    if (id in produkDipilih) {
        var jmlProduk = document.getElementById(`jml-${id}`)
        jmlProduk.innerHTML = parseInt(jmlProduk.innerHTML) +1

        produkDipilih[id][0] = produkDipilih[id][0] +1;

        console.log(id+": ditambah 1")
        
    } else {
        console.log(id+": dimasukkan ke keranjang")
        produkDipilih[id] = [1, nama, harga];
        
        var produkKeKeranjang = document.createElement("div");
        produkKeKeranjang.innerHTML = `
        <div id="produk-${id}">
            <div class="flex justify-between">
                <p class="font-sm text-sm">${nama}</p>
                <div class="flex gap-3">
                    <div class="flex gap-2 items-center">
                        <button type="button" onclick="krgJumlah(${id})" class="rounded-lg text-xs">
                        <span class="px-3 -py-1 bg-slate-50 text-black text-xl rounded-lg">-</span>
                        </button>
                        <p id="jml-${id}">1</p>
                    </div>
                    <div class="flex justify-between">
                        <p x-text="'Rp '+ ${harga}"></p>
                    </div>
                </div>
            </div>
            <input class="w-full h-6 border-slate-400 border-b-1 border-x-0 border-t-0 rounded-md text-sm font-thin p-1" type="text" name="catatan-${id}" id="catatan-${id}" placeholder="Masukkan catatan jika ada">
        </div>
        `;
        
        keranjang.appendChild(produkKeKeranjang);
    }
    console.log(produkDipilih)
    listKeranjang.value = JSON.stringify(produkDipilih)
}
