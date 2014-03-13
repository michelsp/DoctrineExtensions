<?php
namespace DoctrineExtensions\Query\Pgsql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode,
	Doctrine\ORM\Query\Lexer;

/**
 * 
 * Usage: Cast( field AS 'type' )
 * 
 * @author Michel Soares Pintor <michel@michelsp.com.br>
 */
class Cast extends FunctionNode
{
    protected $field;
    protected $type;

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

		$this->field = $parser->ArithmeticPrimary();

		$parser->match(Lexer::T_AS);

		$this->type = $parser->ArithmeticPrimary();

		$parser->match(Lexer::T_CLOSE_PARENTHESIS);
	}

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
		return sprintf('CAST(%s AS %s)', 
			$sqlWalker->walkArithmeticPrimary($this->field), 
			\str_replace('\'', '', $sqlWalker->walkArithmeticPrimary($this->type))
		);
    }
}