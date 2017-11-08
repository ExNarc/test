<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;
use App\QuestionLog;
use Illuminate\Http\Request;

class chart extends Controller
{
	public function index()
	{
		$lava = new Lavacharts;
		$reasons = \Lava::DataTable();

		$reasons->addStringColumn('Reasons')
		->addNumberColumn('Percent');
//for ($i=0; $i < ; $i++) 
		$QstLog = QuestionLog::all();
		$total = $QstLog->count();
		$correct = $QstLog->where('correct','=','1')->count();
		$notcorrect = $QstLog->where('correct','=','0')->count();
		{ 
			$reasons 
			->addRow(['Correct', $correct/$total*100])
			->addRow(['Wrong', $notcorrect/$total*100]);
		}

		\Lava::PieChart('IMDB', $reasons, [
			'title'  => 'correct Percentage',
			'is3D'   => true,
			'slices' => [
				['offset' => 0.2],
			]
		]);
		return view('chart.pchart',['lava'=>$lava]);
	}
//$lava = new Lavacharts; // See note below for Laravel
	public function dindex()
	{
		$lava = new Lavacharts;
		$population = \Lava::DataTable();

		$population->addDateColumn('Year')
		->addNumberColumn('Number of People')
		->addRow(['2006', 100])
		->addRow(['2007', 68504])
		->addRow(['2008', 716845])
		->addRow(['2009', 757254])
		->addRow(['2010', 77034])
		->addRow(['2011', 792353])
		->addRow(['2012', 83657])
		->addRow(['2013', 842780])
		->addRow(['2014', 810390]);

		\Lava::AreaChart('Population', $population, [
			'title' => 'Population Growth',
			'legend' => [
				'position' => 'in'
			]
		]);
		return view('chart.dchart',['lava'=>$lava]);
	}
}