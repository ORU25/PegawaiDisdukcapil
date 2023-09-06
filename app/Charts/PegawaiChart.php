<?php

namespace App\Charts;

use App\Models\Pegawai;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PegawaiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {      
        $dataPegawai = Pegawai::where('jenis','asn')->count();
        $dataTKD = Pegawai::where('jenis','tkd')->count();

        $total = $dataPegawai + $dataTKD;
        return $this->chart->horizontalBarChart()
            // ->setTitle('Banyak Pegawai dan TKD')
            ->setSubtitle('Total ASN dan TKD: '. $total,'')
            ->setColors(['#327da8'])
            ->addData('Jumlah', [$dataPegawai,$dataTKD])
            // ->addData('TKD', [$dataTKD])
            ->setXAxis(['ASN','TKD']);
    }
}
