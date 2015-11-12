from mailmerge import MailMerge
import time
import MySQLdb

print "running"
start = time.time()
path = 'D:/BARBARIKA/xampp/htdocs/inventory/assets/data/'

db = MySQLdb.connect(host="127.0.0.1",
                     user="root",
                      passwd="",
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
		SELECT barang.`NAMABARANG`, barang.`KODEBARANG`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, merk.`NAMAMERK`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI` 
		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI`
		INNER JOIN merk ON merk.`IDMERK` = barang.`IDMERK` 
		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER` 
		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI` WHERE barang.IDBARANG =''' + str(nama_barang) +  " GROUP BY barang.`IDBARANG`"
	#print sql
	cur.execute(sql)

	data = []
	document = MailMerge(path+'LabelSDMI1.docx')
	for row in cur.fetchall():
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
	document.write(path+nama_file + '.docx')

cur.close()
db.close()

end = time.time()
elapsed = end - start
print str(elapsed) + " detik"