from toko import tambah_produk, tampil_produk, update_produk, hapus_produk, cari_produk

def main():
    while True:
        print("\n=== MENU TOKO ELEKTRONIK ===")
        print("1. Tambah Produk")
        print("2. Tampilkan Produk")
        print("3. Update Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk")
        print("0. Keluar")

        pilihan = input("Pilih: ")

        if pilihan == "1":
            tambah_produk()
        elif pilihan == "2":
            tampil_produk()
        elif pilihan == "3":
            update_produk()
        elif pilihan == "4":
            hapus_produk()
        elif pilihan == "5":
            cari_produk()
        elif pilihan == "0":
            print("Keluar program...")
            break
        else:
            print("Pilihan tidak valid!")


if __name__ == "__main__":
    main()
