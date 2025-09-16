#include <iostream>
#include <vector>
using namespace std;

// "include" langsung cpp (biar tanpa .h)
#include "TokoElektronik.cpp"

vector<TokoElektronik> daftarProduk;

// Fungsi CRUD
void tambahProduk() {
    string nama, tipe;
    double harga;
    int stok, watt;

    cout << "Nama: "; cin.ignore(); getline(cin, nama);
    cout << "Harga: "; cin >> harga;
    cout << "Tipe: "; cin.ignore(); getline(cin, tipe);
    cout << "Stok: "; cin >> stok;
    cout << "Watt: "; cin >> watt;

    daftarProduk.push_back(TokoElektronik(nama, harga, tipe, stok, watt));
    cout << "Produk berhasil ditambahkan!\n";
}

void tampilProduk() {
    if (daftarProduk.empty()) {
        cout << "Belum ada produk.\n";
        return;
    }
    cout << "\nDaftar Produk:\n";
    for (size_t i = 0; i < daftarProduk.size(); i++) {
        cout << i + 1 << ". ";
        daftarProduk[i].tampilkan();
    }
}

void updateProduk() {
    tampilProduk();
    if (daftarProduk.empty()) return;

    int idx;
    cout << "Pilih nomor produk yang ingin diupdate: ";
    cin >> idx;

    if (idx < 1 || idx > (int)daftarProduk.size()) {
        cout << "Nomor tidak valid!\n";
        return;
    }

    string nama, tipe;
    double harga;
    int stok, watt;

    cout << "Nama baru: "; cin.ignore(); getline(cin, nama);
    cout << "Harga baru: "; cin >> harga;
    cout << "Tipe baru: "; cin.ignore(); getline(cin, tipe);
    cout << "Stok baru: "; cin >> stok;
    cout << "Watt baru: "; cin >> watt;

    daftarProduk[idx - 1].setNama(nama);
    daftarProduk[idx - 1].setHarga(harga);
    daftarProduk[idx - 1].setTipe(tipe);
    daftarProduk[idx - 1].setStok(stok);
    daftarProduk[idx - 1].setWatt(watt);

    cout << "Produk berhasil diupdate!\n";
}

void hapusProduk() {
    tampilProduk();
    if (daftarProduk.empty()) return;

    int idx;
    cout << "Pilih nomor produk yang ingin dihapus: ";
    cin >> idx;

    if (idx < 1 || idx > (int)daftarProduk.size()) {
        cout << "Nomor tidak valid!\n";
        return;
    }

    daftarProduk.erase(daftarProduk.begin() + (idx - 1));
    cout << "Produk berhasil dihapus!\n";
}

void cariProduk() {
    string keyword;
    cout << "Masukkan nama produk yang dicari: ";
    cin.ignore(); getline(cin, keyword);

    bool ketemu = false;
    for (auto &p : daftarProduk) {
        if (p.getNama().find(keyword) != string::npos) {
            p.tampilkan();
            ketemu = true;
        }
    }
    if (!ketemu) cout << "Produk tidak ditemukan.\n";
}

int main() {
    int pilihan;
    do {
        cout << "\n=== MENU TOKO ELEKTRONIK ===\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Update Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "0. Keluar\n";
        cout << "Pilih: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: tambahProduk(); break;
            case 2: tampilProduk(); break;
            case 3: updateProduk(); break;
            case 4: hapusProduk(); break;
            case 5: cariProduk(); break;
            case 0: cout << "Keluar program...\n"; break;
            default: cout << "Pilihan tidak valid!\n"; break;
        }
    } while (pilihan != 0);

    return 0;
}
