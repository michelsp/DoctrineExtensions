<?php
namespace DoctrineExtensions\Query\Pgsql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode,
	Doctrine\ORM\Query\Lexer;

/**
 * 
 * Usage: ToChar( field, 'format' )
 * 
 * @author Michel Soares Pintor <michel@michelsp.com.br>
 */
class ToChar extends FunctionNode
{
    protected $field;
    protected $value;

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->field = $parser->ArithmeticPrimary();

        $parser->match(Lexer::T_COMMA);

        $this->value = $parser->ArithmeticPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
		return sprintf('TO_CHAR(%s, %s)', 
			$sqlWalker->walkArithmeticPrimary($this->field), 
			$sqlWalker->walkArithmeticPrimary($this->value)
		);
    }
}