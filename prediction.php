<?php


  class MatrixLibrary
    {
        //Gauss-Jordan elimination method for matrix inverse
        public function inverseMatrix(array $matrix)
        {
            //TODO $matrix validation

            $matrixCount = count($matrix);

            $identityMatrix = $this->identityMatrix($matrixCount);
            $augmentedMatrix = $this->appendIdentityMatrixToMatrix($matrix, $identityMatrix);
            $inverseMatrixWithIdentity = $this->createInverseMatrix($augmentedMatrix);
            $inverseMatrix = $this->removeIdentityMatrix($inverseMatrixWithIdentity);

            return $inverseMatrix;
        }

        private function createInverseMatrix(array $matrix)
        {
            $numberOfRows = count($matrix);

            for($i=0; $i<$numberOfRows; $i++)
            {
                $matrix = $this->oneOperation($matrix, $i, $i);

                for($j=0; $j<$numberOfRows; $j++)
                {
                    if($i !== $j)
                    {
                        $matrix = $this->zeroOperation($matrix, $j, $i, $i);
                    }
                }
            }
            $inverseMatrixWithIdentity = $matrix;

            return $inverseMatrixWithIdentity;
        }

        private function oneOperation(array $matrix, $rowPosition, $zeroPosition)
        {
            if($matrix[$rowPosition][$zeroPosition] !== 1)
            {
                $numberOfCols = count($matrix[$rowPosition]);

                if($matrix[$rowPosition][$zeroPosition] === 0)
                {
                    $divisor = 0.0000000001;
                    $matrix[$rowPosition][$zeroPosition] = 0.0000000001;
                }
                else
                {
                    $divisor = $matrix[$rowPosition][$zeroPosition];
                }

                for($i=0; $i<$numberOfCols; $i++)
                {
                    $matrix[$rowPosition][$i] = $matrix[$rowPosition][$i] / $divisor;
                }
            }

            return $matrix;
        }

        private function zeroOperation(array $matrix, $rowPosition, $zeroPosition, $subjectRow)
        {
            $numberOfCols = count($matrix[$rowPosition]);

            if($matrix[$rowPosition][$zeroPosition] !== 0)
            {
                $numberToSubtract = $matrix[$rowPosition][$zeroPosition];

                for($i=0; $i<$numberOfCols; $i++)
                {
                    $matrix[$rowPosition][$i] = $matrix[$rowPosition][$i] - $numberToSubtract * $matrix[$subjectRow][$i];
                }
            }

            return $matrix;
        }

        private function removeIdentityMatrix(array $matrix)
        {
            $inverseMatrix = array();
            $matrixCount = count($matrix);

            for($i=0; $i<$matrixCount; $i++)
            {
                $inverseMatrix[$i] = array_slice($matrix[$i], $matrixCount);
            }

            return $inverseMatrix;
        }

        private function appendIdentityMatrixToMatrix(array $matrix, array $identityMatrix)
        {
            //TODO $matrix & $identityMatrix compliance validation (same number of rows/columns, etc)

            $augmentedMatrix = array();

            for($i=0; $i<count($matrix); $i++)
            {
                $augmentedMatrix[$i] = array_merge($matrix[$i], $identityMatrix[$i]);
            }

            return $augmentedMatrix;
        }

        public function identityMatrix(int $size)
        {
            //TODO validate $size

            $identityMatrix = array();

            for($i=0; $i<$size; $i++)
            {
                for($j=0; $j<$size; $j++)
                {
                    if($i == $j)
                    {
                        $identityMatrix[$i][$j] = 1;
                    }
                    else
                    {
                        $identityMatrix[$i][$j] = 0;
                    }
                }
            }

            return $identityMatrix;
        }
    }

    $matrix = array(
        array(11, 3, 12),
        array(8, 7, 10),
        array(13, 14, 15),
    );

   

    



$conn = new mysqli("localhost","root","","mitapp");
$sql="SELECT * FROM pred ;";
    
    $result=mysqli_query($conn,$sql);
    //$row=mysqli_fetch_array($result);

    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
    	$x[$i] =  $row['x'];
    	$i=$i+1;
    }
    $n= count($x);

  $sigmaP=0;
  $sigmaQ=0;

for ($i = 0; $i <$n ; $i++) {
     $sigmaP=$sigmaP+$x[$i];
     $sigmaQ=$sigmaQ+($i+1)*$x[$i];
}

//echo "x[i]->".$sigmaP."<br>";
//echo "i*x[i]->".$sigmaQ."<br><br>";




$A= $n*($n+1)/2;

$B= -$n;

$C= -$n*($n+1)*((2*$n)+1)/6;

$D= $n*($n+1)/2;


$a=($A*$sigmaP+$B*$sigmaQ)/($A*$D-$B*$C);
$b=($C*$sigmaP+$D*$sigmaQ)/($A*$D-$B*$C);

$goal = round($a*($n+1)+$b);

 // $matrixLibrary = new MatrixLibrary();
 //    $inverseMatrix = $matrixLibrary->inverseMatrix($matrix);

    
 //    $a = $inverseMatrix[0][0];//*$sigmaP + $inverseMatrix[0][1]*$sigmaQ;



$pp = ($a-1)*100/abs($a);
//echo $pp."<br>";
//echo $goal;


?>