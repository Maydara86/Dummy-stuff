<?php
class Hamma implements iterator
	{
		private $position = 0;
		private $tab = ['un','deux','trois','quatre','cinq'];

		public function current ()
		{
			return $this->tab[$this->position];
		}

		public function key ()
		{
			return $this->position;
		}

		public function next ()
		{
			$this->position += 1;
			return $this->tab[$this->position];
		}

		public function rewind ()
		{
			$this->position = 0;
			return $this->tab[$this->position];
		}

		public function valid ()
		{
			if (isset($this->tab[$this->position]))
			{
				echo '<p>La position "'. $this->position .'" est valide</p>';
			}
			else
			{
				echo '<p>La position "'. $this->position .'" n\'est pas valide</p>';
			}
		}
		/*
		public function __sleep ()
		{
			return ['position','tab'];
		}

		public function __wakeup()
		{
			//
		}
		*/
	}

session_start();
//include 'classhamma.php';



if (isset($_SESSION['obj']))
{
	$o = $_SESSION['obj'];
	echo '<p>load session</p>';
}
else
{
	$o = New Hamma;
}
//var_dump($o);
echo $o->next();
echo '<p>'.$o->key().'</p>';
echo '<p>'.$o->valid().'</p>';

$_SESSION['obj'] = $o;
//session_destroy();