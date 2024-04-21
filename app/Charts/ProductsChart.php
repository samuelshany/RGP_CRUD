<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($categories,$products): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle(__('messages.category'))
            ->setSubtitle(__('messages.products'))
            ->addData($products)
            ->setLabels($categories);



    }
    public function build2($categories,$products): \ArielMejiaDev\LarapexCharts\DonutChart
    {

            return $this->chart->donutChart()
            ->setTitle(__('messages.category'))
            ->setSubtitle(__('messages.products'))
            ->addData($products)
            ->setLabels($categories);

    }
}
