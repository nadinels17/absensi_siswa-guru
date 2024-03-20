const absen = document.getElementById('absen')
const table = document.getElementById('table')
const tbody = document.getElementById('tbody')

const handleChange = () => {
    let val = absen.value

    if (val != 0 && val > 0) table.classList.remove('d-none')
    else table.classList.add('d-none')

    tbody.innerHTML = ''

    for (let i = 0; i < val; i++) {
        let tr = document.createElement('tr')
        tr.innerHTML = `<tr>
        <td>  
            <div class="keterangan">
                <!-- form group untuk kelas -->
                    <select class="form-select pilih-siswa" name="nama" id="siswa" aria-label="Default select example">
                    <option value="-" class="text-muted nama-siswa">Pilih Nama Siswa</option>
                        <?php
                            $qry = mysqli_query($conn, "SELECT nama_siswa FROM siswa_smkn12 WHERE id_kelas = '<?=$_SESSION["kelas"];' ") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($qry)) {
                        ?>
                            <option class="nama-siswa" value="<?= $data['id_siswa']; ?>"><?= $data['nama_siswa']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
        </td>
        <td>  
            <div class="izin">
                <select class="form-select pilih-ket " aria-label="Default select example">
                <option class="keter" selected>Keterangan</option>
                <option class="keter" value="Sakit">Sakit</option>
                <option class="keter" value="Izin">Izin</option>
                <option class="keter" value="Alfa">Alfa</option>
                </select>
            </div>
        </td> 
        <td></td>  
    </tr>`
        tbody.appendChild(tr)
    }
}

absen.addEventListener('input', handleChange)