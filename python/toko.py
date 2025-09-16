class TokoElektronik:
    def __init__(self, nama, harga, tipe, stok, watt):
        self.nama = nama
        self.harga = harga
        self.tipe = tipe
        self.stok = stok
        self.watt = watt

    def tampilkan(self):
        print(f"{self.nama} ({self.tipe}) - Stok: {self.stok}, "
              f"Harga: Rp{self.harga:,.0f}, Daya: {self.watt}W")


# List untuk menyimpan semua produk
daftar_produk = []


# === CRUD Functions ===
def tambah_produk():
    nama = input("Nama: ")
    harga = float(input("Harga: "))
    tipe = input("Tipe: ")
    stok = int(input("Stok: "))
    watt = int(input("Watt: "))

    produk = TokoElektronik(nama, harga, tipe, stok, watt)
    daftar_produk.append(produk)
    print("Produk berhasil ditambahkan!")


def tampil_produk():
    if not daftar_produk:
        print("Belum ada produk.")
        return
    print("\nDaftar Produk:")
    for i, produk in enumerate(daftar_produk, start=1):
        print(f"{i}. ", end="")
        produk.tampilkan()


def update_produk():
    tampil_produk()
    if not daftar_produk:
        return
    try:
        idx = int(input("Pilih nomor produk yang ingin diupdate: ")) - 1
        if idx < 0 or idx >= len(daftar_produk):
            print("Nomor tidak valid!")
            return

        nama = input("Nama baru: ")
        harga = float(input("Harga baru: "))
        tipe = input("Tipe baru: ")
        stok = int(input("Stok baru: "))
        watt = int(input("Watt baru: "))

        daftar_produk[idx].nama = nama
        daftar_produk[idx].harga = harga
        daftar_produk[idx].tipe = tipe
        daftar_produk[idx].stok = stok
        daftar_produk[idx].watt = watt

        print("Produk berhasil diupdate!")
    except ValueError:
        print("Input tidak valid!")


def hapus_produk():
    tampil_produk()
    if not daftar_produk:
        return
    try:
        idx = int(input("Pilih nomor produk yang ingin dihapus: ")) - 1
        if idx < 0 or idx >= len(daftar_produk):
            print("Nomor tidak valid!")
            return
        del daftar_produk[idx]
        print("Produk berhasil dihapus!")
    except ValueError:
        print("Input tidak valid!")


def cari_produk():
    keyword = input("Masukkan nama produk yang dicari: ").lower()
    ketemu = False
    for produk in daftar_produk:
        if keyword in produk.nama.lower():
            produk.tampilkan()
            ketemu = True
    if not ketemu:
        print("Produk tidak ditemukan.")
