# Mengatasi FileNotFoundError

#Nama   : Rifky Apriliana Arya Putra
#Nim    : 210511023
#Kelas  : R1

try:
    with open("file_yang_tidak_ada.txt") as file:
        data = file.read()
except FileNotFoundError:
    print("File yang diminta tidak ditemukan!")
