<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductsChartDonat
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($categories,$products): \ArielMejiaDev\LarapexCharts\DonutChart
    {

            return $this->chart->donutChart()
            ->setTitle(__('messages.category'))
            ->setSubtitle(__('messages.products'))
            ->addData($products)
            ->setLabels($categories);

    
}
}
