<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfViewReporteSegundosTerceros Model
 *
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 *
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfViewReporteSegundosTercerosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('xmf_view_reporte_segundos_terceros');
        $this->setPrimaryKey('id');

        $this->belongsTo('XmfCasillas', [
            'foreignKey' => 'xmf_casillas_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->decimal('votantes_segundo')
            ->allowEmpty('votantes_segundo');

        $validator
            ->decimal('promovidos_segundo')
            ->allowEmpty('promovidos_segundo');

        $validator
            ->decimal('votantes_tercero')
            ->allowEmpty('votantes_tercero');

        $validator
            ->decimal('promovidos_tercero')
            ->allowEmpty('promovidos_tercero');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['xmf_casillas_id'], 'XmfCasillas'));

        return $rules;
    }
}
