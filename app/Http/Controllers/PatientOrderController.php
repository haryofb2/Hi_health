<?php

namespace App\Http\Controllers;

use App\Helpers\KdHelpers;
use App\Models\MCabang;
use App\Models\MPasien;
use App\Models\MPemeriksaan;
use App\Models\MPilihan;
use App\Models\TPemeriksaanPoliDetail;
use App\Models\TRegistrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;
// use App\Helpers\PhpSerial;

class PatientOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        // return view('content.order_laboratory.transaction.patient_order_information.home.home');

        $serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

        $serialPort->open("COM4");
        while ($data = $serialPort->read()) {
            echo $data."\n";

            if ($data === "OK") {
                $serialPort->write("1\n");
                $serialPort->close();
            }
        }

        // include 'App\Helpers\PhpSerial.php';

        // $serial = new PhpSerial;

        // // First we must specify the device. This works on both linux and windows (if
        // // your linux serial device is /dev/ttyS0 for COM1, etc)
        // $serial->deviceSet("COM4");

        // // We can change the baud rate, parity, length, stop bits, flow control
        // $serial->confBaudRate(9600);
        // $serial->confParity("none");
        // $serial->confCharacterLength(8);
        // $serial->confStopBits(1);
        // $serial->confFlowControl("none");

        // // Then we need to open it
        // $serial->deviceOpen();

        // // To write into
        // $read = $serial->readPort();

        // dd($read);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
        return view('content.order_laboratory.transaction.patient_order_information.add.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->no_urut);

        $now = Carbon::now();
        // $date_now = $now->format('Y-m-d');
        // $time_now = $now->format('H.i');

        $nama_table = 't_registrasi';
        $nama_table_detail = 't_pemeriksaan_poliklinik_detail';
        $no_doc = 'OR';
        $cabang = MCabang::first()->kd_cabang;

        if ($request->kd_registrasi == null) {

            $new_kd = KdHelpers::makekd($nama_table);
            $pil_jenis_registrasi = MPilihan::where('group_pilihan','jenis_menu_transaksi')->where('pilihan','Laboratory Registration')->first()->kd_pilihan;
            $header_str = [
                'kd_registrasi' => $new_kd,
                'no_registrasi' => KdHelpers::makeno($no_doc),
                'tgl_registrasi' => $now,
                'jam_registrasi' => $now->format('H.i'),
                'kd_pil_shift' =>'',
                'kd_cabang' => $cabang,
                'kd_pil_jenis_registrasi' =>$pil_jenis_registrasi,
                'kd_poliklinik' => $request->kd_poliklinik,
                'status_dokter' => $request->status_dokter,
                'kd_dokter' => $request->kd_dokter,
                'title_dokter' => $request->title_dokter,
                'nama_dokter' => $request->nama_dokter,
                'lokasi_praktek_dokter' => $request->lokasi_praktek_dokter,
                'kd_dokter_lab' => $request->kd_dokter_lab,
                'status_jaminan_pasien' => $request->status_jaminan_pasien,
                'kd_karyawan_01' => $request->kd_karyawan_01,
                'kd_karyawan_02' => $request->kd_karyawan_02,
                'kd_pil_status_registrasi' => '10081',
                'kd_pil_status_billing' => '10090',
                'kd_pil_status_check_in_sample' => '10083',
                'kd_pil_status_hasil_alat' => '10086',
                'kd_pil_status_kirim_hasil_pasien' => '10093',
                'kd_pil_status_akseptasi' => '10002',
                'banyak_print' => '0',
                'kd_user_input' => Auth::user()->id,
                'kd_user_update' => Auth::user()->id,
                'tgl_input' => $now,
                'tgl_update' => $now,
                'status' => config('variabel.gi_input'),
                'status_transfer' => 'F',
            ];

            foreach ($header_str as $key => $value) {
                if (is_null($value)) {
                    $header_str[$key] = '';
                }
            }

            if ($request->jenis_pasien == 'N') {
                # code...
                $nama_table_pasien = 'm_pasien';
                $no_doc_pasien = 'MRP';
                $new_kd_pasien = KdHelpers::makekd($nama_table_pasien);

                $pasien_baru = [
                'kd_pasien' => $new_kd_pasien,
                'no_pasien' => KdHelpers::makeno($no_doc_pasien),
                'title_pasien' => $request->title_pasien,
                'nama_pasien' => $request->nama_pasien,
                'nama_ibu_kandung' => $request->nama_ibu_kandung,
                'tgl_lahir' => $request->tgl_lahir,
                'kd_pil_jenis_kelamin' => $request->kd_pil_jenis_kelamin,
                'alamat_domisili' => $request->alamat_domisili,
                'kd_kota' => $request->kd_kota,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kodepos' => $request->kodepos,
                'no_telp' => $request->no_telp,
                'no_hp' => $request->no_hp,
                'no_ktp' => $request->no_ktp,
                'alamat_ktp' => $request->alamat_ktp,
                'email' => $request->email,
                'kd_user_input' => $request->kd_user_input,
                'kd_user_update' => $request->kd_user_update,
                'tgl_input' => $request->tgl_input,
                'tgl_update' => $request->tgl_update,
                'status' => $request->status,
                'status_transfer' => $request->status_transfer,
                ];

                foreach ($pasien_baru as $key => $value) {
                    if (is_null($value)) {
                        $pasien_baru[$key] = '';
                    }
                }

                MPasien::Create($pasien_baru);

                $kd_pasien = $new_kd_pasien;

            } else {
                $kd_pasien = $request->kd_pasien;
            }

            $m_pasien = MPasien::where('m_pasien.kd_pasien',$kd_pasien)->first();

            $header_pasien = [
                'kd_pasien' => $m_pasien->kd_pasien,
                'no_pasien' => $m_pasien->no_pasien,
                'title_pasien' => $m_pasien->title_pasien,
                'nama_pasien' => $m_pasien->nama_pasien,
                'nama_ibu_kandung' => $m_pasien->nama_ibu_kandung,
                'tgl_lahir' => $m_pasien->tgl_lahir,
                'kd_pil_jenis_kelamin' => $m_pasien->kd_pil_jenis_kelamin,
                'alamat_domisili' => $m_pasien->alamat_domisili,
                'kd_kota' => $m_pasien->kd_kota,
                'kelurahan' => $m_pasien->kelurahan,
                'kecamatan' => $m_pasien->kecamatan,
                'kodepos' => $m_pasien->kodepos,
                'no_telp' => $m_pasien->no_telp,
                'no_hp' => $m_pasien->no_hp,
                'no_ktp' => $request->no_ktp,
                'alamat_ktp' => $m_pasien->alamat_ktp,
                'email' => $m_pasien->email,
            ];

            foreach ($header_pasien as $key => $value) {
                if (is_null($value)) {
                    $header_pasien[$key] = '';
                }
            }


            $no_urut = $request->no_urut;
            $nama_pemeriksaan = $request->nama_pemeriksaan;
            $kd_pemeriksaan = $request->kd_pemeriksaan;
            // $urutan =0;

            $merge = array_combine($no_urut,$nama_pemeriksaan);

            foreach ($merge as $key => $gabungan) {
                # code...
                // $coba
                $keterangan_pemeriksaan[] = $key.$gabungan;
            }

            $header_str['keterangan_pemeriksaan'] = implode(' ~r ',$keterangan_pemeriksaan);

            foreach ($no_urut as $key => $urutan) {
                # code...
                $new_kd_detail = KdHelpers::makekd($nama_table_detail);

                $pemeriksaan_detail = new TPemeriksaanPoliDetail;
                $pemeriksaan_detail->kd_pemeriksaan_poliklinik_detail = $new_kd_detail;
                $pemeriksaan_detail->kd_pemeriksaan_poliklinik = '';
                $pemeriksaan_detail->kd_registrasi = $new_kd;
                $pemeriksaan_detail->keterangan_detail = '';
                $pemeriksaan_detail->jenis_pemeriksaan = '';
                $pemeriksaan_detail->jumlah = 1;
                $pemeriksaan_detail->harga = MPemeriksaan::where('kd_pemeriksaan',$kd_pemeriksaan[$key])->first()->harga;
                $pemeriksaan_detail->id_sample = '';
                $pemeriksaan_detail->jam_ambil_sample = '0.00';
                $pemeriksaan_detail->kd_pil_wadah_sample = '';
                $pemeriksaan_detail->kd_karyawan_ambil_sample = '';
                $pemeriksaan_detail->jam_checkin_sample = '0.00';
                $pemeriksaan_detail->status_checkin_sample = '';
                $pemeriksaan_detail->save();
            }

            return redirect()->back();


        } else {
            # code...
        }


        // dd($time_now);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
