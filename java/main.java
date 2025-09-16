import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        while (true) {
            System.out.println("\n=== MENU TOKO ELEKTRONIK ===");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Tampilkan Produk");
            System.out.println("3. Update Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk");
            System.out.println("0. Keluar");
            System.out.print("Pilih: ");

            String pilihan = input.nextLine();

            switch (pilihan) {
                case "1":
                    TokoElektronik.tambahProduk();
                    break;
                case "2":
                    TokoElektronik.tampilProduk();
                    break;
                case "3":
                    TokoElektronik.updateProduk();
                    break;
                case "4":
                    TokoElektronik.hapusProduk();
                    break;
                case "5":
                    TokoElektronik.cariProduk();
                    break;
                case "0":
                    System.out.println("Keluar program...");
                    input.close();
                    return;
                default:
                    System.out.println("Pilihan tidak valid!");
            }
        }
    }
}
