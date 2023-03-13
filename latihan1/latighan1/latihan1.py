class Motor:
    def __init__(self, merk, tahun_pembuatan):
        self.merk = merk
        self.tahun_pembuatan = tahun_pembuatan
    def info(self):
        print(f"motor {self.merk} tahun_pembuatan {self.tahun_pembuatan}")

Motor = Motor ("kawasaki w175", "2019") 
Motor.info()