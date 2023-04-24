#Mengatasi MemoryError

#Nama   : Rifky Apriliana Arya Putra
#Nim    : 210511023
#Kelas  : R1

try:
    data = " " * (10**10)
except MemoryError:
    print("Memori tidak cukup untuk menampung data yang diminta!")