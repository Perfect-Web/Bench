<?php
/**
 * Created by Perfect Web SRL
 * User: Alin Jurj
 * Date: 18.06.2014
 * Time: 20:58
 */

class Benchmark extends Bench
{

	function display()
	{

~rt($this->getStats());
		$table = new Zend\Text\Table\Table(array(
			                                   'columnWidths' => array(
				                                   50,
				                                   3,
				                                   1,
				                                   15,
				                                   15,
				                                   15,
				                                   15,
				                                   1,
				                                   15,
				                                   15,
				                                   15,
				                                   15
			                                   )
		                                   ));

		if (count($this->sections) == 1) {
			$table->appendRow('No Data');
		}
		else {

			$table->appendRow(array(
				                  'Section',
				                  '#',
				                  '',
				                  'Time',
				                  '',
				                  '',
				                  '',
				                  '',
				                  'Memory',
				                  '',
				                  '',
				                  ''
			                  ));

			$table->appendRow(array(
				                  '',
				                  '',
				                  '',
				                  'total',
				                  'mean',
				                  'median',
				                  'deviation',
				                  '',
				                  'total',
				                  'mean',
				                  'median',
				                  'deviation'
			                  ));


			foreach ($this->sections as $name => $section) {

				if ($name == 'total') {
					continue;
				}

				$table->appendRow(array(
					                  $name,
					                  $section['totals']['count'].'',
					                  '',
					                  $this->units('time', $section['totals']['time']),
					                  $this->units('time', $section['totals']['mean_time']),
					                  $this->units('time', $section['totals']['median_time']),
					                  '+/-'.$this->units('time', $section['totals']['median_time_deviation']),
					                  '',
					                  $this->units('bytes', $section['totals']['memory']),
					                  $this->units('bytes', $section['totals']['mean_memory']),
					                  $this->units('bytes', $section['totals']['median_memory']),
					                  '+/-'.$this->units('bytes', $section['totals']['median_memory_deviation'])
				                  ));

			}

		}

		echo $table;


	}

}
