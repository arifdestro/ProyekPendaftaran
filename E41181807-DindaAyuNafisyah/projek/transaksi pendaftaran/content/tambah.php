<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h3>Tambah Anggota / Edit</h3>
</head>
<body>
<div class="content">
    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="nama">Nama Lengkap</label></td>
            <td colspan="3"><input name="nama" id="nama" type="text" class="form"></td>
        </tr>
        <tr>
            <td><label for="tempat_lahir">Tempat Lahir</label></td>
            <td><input name="tempat_lahir" id="tempat_lahir" type="text" class="form"></td>
            <td><label>Tanggal Lahir</label></td>
            <td>
                <select name="tgl_lahir" class="form">
                    <option>xx</option>
                    <option>xx</option>
                    <option>xx</option>
                </select>
                <select name="bln_lahir" class="form">
                    <option>xx</option>
                    <option>xx</option>
                    <option>xx</option>
                </select>
                <select name="thn_lahir" class="form">
                    <option>xxxx</option>
                    <option>xxxx</option>
                    <option>xxxx</option>
                </select>
            </td>
        </tr>
        <tr>
            <td valign="top"><label for="alamat">Alamat</label></td>
            <td valign="top" colspan="2">
                <textarea name="alamat" id="alamat" class="form" cols="50" rows="8"></textarea>
            </td>
            <td valign="top">
                <div>
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" id="kota" class="form">
                </div>
                <div>
                    <label for="negara">Negara</label>
                    <input type="text" name="negara" id="negara" class="form">
                </div>
                <div>
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" name="kode_pos" id="kode_pos" class="form">
                </div>
            </td>
        </tr>
        <tr>
            <td><label for="hp">No. HP</label></td>
            <td colspan="3"><input name="hp" id="hp" type="number" class="form"></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td colspan="3"><input name="email" id="email" type="text" class="form"></td>
        </tr>
        <tr>
            <td><label for="tingg_badan">Tinggi Badan</label></td>
            <td colspan="3"><input name="tingg_badan" id="tingg_badan" type="number" class="form"></td>
        </tr>
        <tr>
            <td><label for="berat_badan">Berat Badan</label></td>
            <td colspan="3"><input name="berat_badan" id="berat_badan" type="number" class="form"></td>
        </tr>
    </table>
</div>
<input type="submit" class="btn" value="Simpan">
        </div>  
</body>
</html>

