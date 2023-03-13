class Mahasiswa:
    def __init__(self, nama, nim):
        self.nama = nama
        self.nim = nim
    def info(self):
        print(f"Nama : {self.nama}\ nim : {self.nim}")

Mahasiswa = Mahasiswa ("Rifky Apriliana Arya Putra", "210511023")
Mahasiswa.info()