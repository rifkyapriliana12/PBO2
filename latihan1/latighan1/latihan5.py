class PesawatTerbang:
    def __init__(self, maskapai, tujuan, Jam_terbang):
     self.maskapai = maskapai
     self.tujuan = tujuan
     self.Jam_terbang = Jam_terbang
    def info(self):
     print(f"Maskapai: {self.maskapai}\nTujuan: {self.tujuan}\nJam_terbang; {self.Jam_terbang}")
pesawatA = PesawatTerbang("Lion Air", "Jakarta - Padang", "12:00 WIB")
pesawatA.info()