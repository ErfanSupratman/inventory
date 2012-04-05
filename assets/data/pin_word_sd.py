#!/usr/bin/env python

from mailmerge import MailMerge
import time
import MySQLdb

print "running"
start = time.time()
path = '/var/www/html/inventory/assets/data/'

db = MySQLdb.connect(host="127.0.0.1",
                     user="inventory",
                      passwd="inventory123!",
                      db="inventory")
cur = db.cursor()
get_barang = "select idbarang from barang;"
cur.execute(get_barang)
daftar_barang = cur.fetchall()

for idbarang in daftar_barang:
	nama_barang		= idbarang[0]
	nama_file		= str(nama_barang);
	#nama_file		= nama_file.replace("/", "")
	#nama_lokasi	= db.escape_string(nama_lokasi)
	sql = '''
		SELECT barang.`NAMABARANG`, kodebarang.`KODE`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, barang.`MERKBARANG`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI` 
		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER` 
		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI` 
		INNER JOIN kodebarang ON kodebarang.`IDKODE` = barang.`IDKODE` WHERE barang.IDBARANG =''' + str(nama_barang) +  " GROUP BY barang.`IDBARANG`"
	#print sql
	cur.execute(sql)

	data = []
	document = MailMerge(path+'LabelSDMI.docx')
	print document
	for row in cur.fetchall():
		print "execute"
		i = row[2]
		for x in range(i):
			temp = {}
			temp['tahun'] = str(row[4].year)
			temp['asal_dana']		= row[7]
			temp['nama_barang']		= row[0]
			temp['no_barang']		= row[1]
			temp['lokasi'] = row[8]
			temp['no'] = str(x+1)
			data.append(temp)

	document.merge_rows('no_barang', data)
	document.write(path+nama_file + '.doc')

cur.close()
db.close()

end = time.time()
elapsed = end - start
print str(elapsed) + " detik"
