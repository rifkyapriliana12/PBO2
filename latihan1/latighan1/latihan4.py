class Skripsi:
    def __init__(self, judul, penulis, Tahun):
     self.judul = judul
     self.penulis = penulis
     self.Tahun = Tahun
    def info(self):
     print(f"Judul: {self.judul}\nPenulis: {self.penulis}\nTahun:{self.Tahun}")
skripsiA = Skripsi("Sistem Informasi", "Rifky Apriliana", "2023")
skripsiA.info()