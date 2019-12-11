<?php
namespace DoctrineExtensions\Query\Pgsql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode,
	Doctrine\ORM\Query\Lexer;

/**
 * 
 * Desvio Padrão
 * 
 * Usage: Ltrim( field )
 * 
 * @author Michel Soares Pintor <michel@michelsp.com.br>
 */
class Ltrim extends FunctionNode
{
    protected $field;

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->field = $parser->ArithmeticPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
		return sprintf('LTRIM(%s)', 
			$sqlWalker->walkArithmeticPrimary($this->field)
		);
    }
}
