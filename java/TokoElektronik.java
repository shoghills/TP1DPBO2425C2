import java.util.ArrayList;
import java.util.Scanner;

public class TokoElektronik {
    private String nama;
    private double harga;
    private String tipe;
    private int stok;
    private int watt;

    public TokoElektronik(String nama, double harga, String tipe, int stok, int watt) {
        this.nama = nama;
        this.harga = harga;
        this.tipe = tipe;
        this.stok = stok;
        this.watt = watt;
    }

    public void tampilkan() {
        System.out.printf("%s (%s) - Stok: %d, Harga: Rp%.0f, Daya: %dW%n",
                          nama, tipe, stok, harga, watt);
    }

    // Getter & Setter
    public String getNama() { return nama; }
    public void setNama(String nama) { this.nama = nama; }
    public double getHarga() { return harga; }
    public void setHarga(double harga) { this.harga = harga; }
    public String getTipe() { return tipe; }
    public void setTipe(String tipe) { this.tipe = tipe; }
    public int getStok() { return stok; }
    public void setStok(int stok) { this.stok = stok; }
    public int getWatt() { return watt; }
    public void setWatt(int watt) { this.watt = watt; }

    // ================= CRUD Static Methods =================
    private static ArrayList<TokoElektronik> daftarProduk = new ArrayList<>();
    private static Scanner input = new Scanner(System.in);

    public static void tambahProduk() {
        System.out.print("Nama: ");
        String nama = input.nextLine();
        System.out.print("Harga: ");
        double harga = input.nextDouble();
        input.nextLine();
        System.out.print("Tipe: ");
        String tipe = input.nextLine();
        System.out.print("Stok: ");
        int stok = input.nextInt();
        System.out.print("Watt: ");
        int watt = input.nextInt();
        input.nextLine();

        TokoElektronik produk = new TokoElektronik(nama, harga, tipe, stok, watt);
        daftarProduk.add(produk);
        System.out.println("Produk berhasil ditambahkan!");
    }

    public static void tampilProduk() {
        if (daftarProduk.isEmpty()) {
            System.out.println("Belum ada produk.");
            return;
        }
        System.out.println("\nDaftar Produk:");
        int i = 1;
        for (TokoElektronik p : daftarProduk) {
            System.out.print(i + ". ");
            p.tampilkan();
            i++;
        }
    }

    public static void updateProduk() {
        tampilProduk();
        if (daftarProduk.isEmpty()) return;

        System.out.print("Pilih nomor produk yang ingin diupdate: ");
        int idx = input.nextInt() - 1;
        input.nextLine();

        if (idx < 0 || idx >= daftarProduk.size()) {
            System.out.println("Nomor tidak valid!");
            return;
        }

        System.out.print("Nama baru: ");
        String nama = input.nextLine();
        System.out.print("Harga baru: ");
        double harga = input.nextDouble();
        input.nextLine();
        System.out.print("Tipe baru: ");
        String tipe = input.nextLine();
        System.out.print("Stok baru: ");
        int stok = input.nextInt();
        System.out.print("Watt baru: ");
        int watt = input.nextInt();
        input.nextLine();

        TokoElektronik produk = daftarProduk.get(idx);
        produk.setNama(nama);
        produk.setHarga(harga);
        produk.setTipe(tipe);
        produk.setStok(stok);
        produk.setWatt(watt);

        System.out.println("Produk berhasil diupdate!");
    }

    public static void hapusProduk() {
        tampilProduk();
        if (daftarProduk.isEmpty()) return;

        System.out.print("Pilih nomor produk yang ingin dihapus: ");
        int idx = input.nextInt() - 1;
        input.nextLine();

        if (idx < 0 || idx >= daftarProduk.size()) {
            System.out.println("Nomor tidak valid!");
            return;
        }

        daftarProduk.remove(idx);
        System.out.println("Produk berhasil dihapus!");
    }

    public static void cariProduk() {
        System.out.print("Masukkan nama produk yang dicari: ");
        String keyword = input.nextLine().toLowerCase();

        boolean ketemu = false;
        for (TokoElektronik p : daftarProduk) {
            if (p.getNama().toLowerCase().contains(keyword)) {
                p.tampilkan();
                ketemu = true;
            }
        }

        if (!ketemu) {
            System.out.println("Produk tidak ditemukan.");
        }
    }
}
