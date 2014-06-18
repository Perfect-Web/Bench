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

		$table = new Zend\Text\Table\Table(array('columnWidths' => array(50, 25, 25)));
		$table->appendRow(array('Section', 'Duration', 'Since start'));

		$longest = $this->getLongestMark();
		$shortest = $this->getShortestMark();

		foreach($this->getMarks() as $mark){
			$table->appendRow(array($mark['id'], $mark['since_last_mark'], $mark['since_start']));
		}

		$table->appendRow(array('Longest: '.$longest['id'], $longest['since_last_mark'], $longest['since_start']));
		$table->appendRow(array('Shortest: '.$shortest['id'], $shortest['since_last_mark'], $shortest['since_start']));
		$table->appendRow(array('Average ', $this->getMarkAverage(), ''));

		echo $table;

	}

}
