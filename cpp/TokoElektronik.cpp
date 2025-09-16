#include <iostream>
#include <string>
#include <iomanip>
using namespace std;

class TokoElektronik {
private:
    string nama;
    double harga;
    string tipe;
    int stok;
    int watt;

public:
    TokoElektronik(string n, double h, string t, int s, int w)
        : nama(n), harga(h), tipe(t), stok(s), watt(w) {}

    // Getter
    string getNama() const { return nama; }
    double getHarga() const { return harga; }
    string getTipe() const { return tipe; }
    int getStok() const { return stok; }
    int getWatt() const { return watt; }

    // Setter
    void setNama(string n) { nama = n; }
    void setHarga(double h) { harga = h; }
    void setTipe(string t) { tipe = t; }
    void setStok(int s) { stok = s; }
    void setWatt(int w) { watt = w; }

    void tampilkan() const {
        cout << nama << " (" << tipe << ") - Stok: " << stok
             << ", Harga: Rp" << fixed << setprecision(0) << harga
             << ", Daya: " << watt << "W" << endl;
    }
};
