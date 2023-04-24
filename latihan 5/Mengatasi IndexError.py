# Mengatasi IndexError

#Nama   : Rifky Apriliana Arya Putra
#Nim    : 210511023
#Kelas  : R1

list_angka = [1, 2, 3]
try:
    value = list_angka[4]
except IndexError:
    print("Index yang diminta melebihi jumlah elemen dalam list!")
